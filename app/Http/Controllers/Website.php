<?php

namespace App\Http\Controllers;

use App\Http\Requests\ConsultationRequest;
use App\Http\Requests\DonationRequest;
use Illuminate\Http\Request;
use Illuminate\Mail\Message;
use Ramsey\Uuid\Uuid;
use Stripe\Charge;
use Stripe\Customer;
use Stripe\Stripe;
use Stripe\Subscription;
use App\Models\CancelDonationSubscription;

class Website extends Controller
{
    public function indexWildCard()
    {
        return view('index');
    }

    public function indexDonationCard()
    {
        return view('index');
    }

    private static function bootStrapStripe()
    {
        Stripe::setApiKey(config('services.stripe.secret'));
        Stripe::setClientId(config('services.stripe.key'));
        Stripe::setApiVersion("2018-05-21");
    }

    // TODO: Figure out what a cc decline looks like and attach to front-end logic.
    public function donationSubmit(Request $request)
    {
        self::bootStrapStripe();

        $validateDonationRequest = new DonationRequest();
        $data = $request->request->all();
        $validation = \Validator::make($data, $validateDonationRequest->rules(), $validateDonationRequest->messages());
        if($validation->fails()) {
            return response()->json([
                'status' => false,
                'errors' => $validation->errors()
            ], 422);
        }

        $plans = config('services.stripe.plans');
        $planHighestValue = array_map(function($val)
        {
            return $val['amount'];
        }, $plans);
        $planHighestValue = max($planHighestValue);

        $form = $data['form'];

        $customerStripeId = null;
        $customers = Customer::all([
            "limit" => 1,
            'email'=>$form['email']
        ]);

        $submitAccount = [
            'description' => "Customer for {$form['email']}",
            'email'  => $form['email'],
            'source' => $data['stripeToken'],
            'shipping'=>[
                'name'=>$data['name'],
                'address'=>[
                    'line1'       =>$form['address'],
                    'city'        =>$form['city'],
                    'postal_code' =>$form['zip_code'],
                    'state'       =>$form['state']
                ]
            ]
        ];

        /**
         * @var $found_customer array|bool
         */
        $found_customer = false;
        if(count($customers['data']) > 0)
        {
            try
            {
                $found_customer = $customers['data'][0];
                $customerStripeId = $found_customer['id'];
                $stripeCustomer = Customer::retrieve($customerStripeId);
                $stripeCustomer->source = $data['stripeToken'];
                $stripeCustomer->shipping = $submitAccount['shipping'];
                $stripeCustomer->save();
            }
            catch(\Stripe\Error\Card $e)
            {
                $body = $e->getJsonBody();
                return response()->json([
                    'status' => false,
                    'card_errors' => $body['error']
                ], $e->getHttpStatus());
            }
        }
        else
        {
            $customer = Customer::create($submitAccount);
            $customerStripeId = $customer['id'];
        }

        $amount = (int)$form['amount'];
        $plan = array_filter($plans, function($plan) use($amount, $form, $planHighestValue)
        {
            return ($plan['eq'] == $amount) || ($plan['eq'] == 1 && $form['isCustom'] === true);
        });
        if(!count($plan) === 1)
        {
            throw new \Exception("Fix Logic");
        }
        $plan = array_pop($plan);

        $isSuccessful = false;
        switch($data['payment_info']['payment_type'])
        {
            case 'subscription':
                $subscription_plan_item = [
                    "plan" => $plan['id']
                ];
                if($form['isCustom'] && $plan['eq'] == 1)
                {
                    $subscription_plan_item['quantity'] = $amount;
                }
                $submitSubscription = [
                    "customer" => $customerStripeId,
                    "items" => [
                        $subscription_plan_item
                    ]
                ];

                /**
                 * REASON FOR THIS LINE
                 * If we have a subscription already in the system,
                 * we want to change it, so we must remove the existing subscription,
                 * then add the new one
                 */
                if($found_customer !== false)
                    self::cancelStripSubscription($found_customer, $form['email'], $form['zip_code']);

                Subscription::create($submitSubscription);
                $isSuccessful = true;
                break;

            case 'simple-donation':
                $format_charge_cost = number_format($amount);
                $submitCharge = [
                    "amount" => $amount * 100,
                    "currency" => "usd",
                    "customer" => $customerStripeId,
                    "description" => "Charge for {$form['email']} for: {$format_charge_cost}"
                ];

                Charge::create($submitCharge);
                $isSuccessful = true;
                break;

            default:
                throw new \Exception("Fix Logic");
        }

        $appName = self::getAppName();

        if($isSuccessful)
        {
            try
            {
                \Mail::send('emails.welcome', [
                    'data' => $data,
                    'cancel_url' => url()->to('/cancel-subscription')
                ], function (Message $m) use ($appName, $data) {
                    $domain = config('services.mailgun.domain');
                    $m->from("noreply@{$domain}", config('app.name'));

                    $subject = "{$appName} Thanks you for your donation";
                    $m->to($data['form']['email'], $data['name'])->subject($subject);
                });

                return response()->json([
                    'success'=>true
                ]);
            }
            catch(\Exception $e)
            {
                \Log::emergency($e->getMessage()."\n".$e->getTraceAsString());
                return response()->json([
                    'success'=>false
                ], 422);
            }
        }

        return response()->json([
            'success'=>false
        ]);
    }

    public function consultationSubmit(Request $request)
    {
        $validateConsultationRequest = new ConsultationRequest();
        $data = $request->all();
        $validation = \Validator::make($data, $validateConsultationRequest->rules());
        $validation->sometimes('organization_name', 'required', function ($input) {
            return $input->isOrganization;
        });
        if($validation->fails()) {
            return response()->json([
                'status' => false,
                'errors' => $validation->errors()
            ], 422);
        }

        $data['name'] = "{$data['first_name']} {$data['last_name']}";

        $appName = self::getAppName();

        \Mail::send('emails.consultation-submitted', ['data' => $data], function (Message $m) use ($appName, $data) {
            $domain = config('services.mailgun.domain');
            $m->from("noreply@{$domain}", config('app.name'));

            $subject = "{$appName} Consultation Submitted";
            $m->to($data['email'], $data['name'])->subject($subject);
        });

        \Mail::send('emails.consultation-request', ['data' => $data], function (Message $m) use ($appName, $data) {
            $domain = config('services.mailgun.domain');
            $m->from("noreply@{$domain}", config('app.name'));

            $time = date(\DATE_ATOM);
            $subject = "{$appName} Consultation requested by {$data['name']} @ {$time}";
            $m->to(config('app.consultation_email'), "CONSULTATION")->subject($subject);
        });

        return response()->json([
            'success'=>true
        ]);
    }

    public function cancelSubscription(Request $request)
    {
        self::bootStrapStripe();

        $data = $request->all();

        $uuid1 = Uuid::uuid1();
        $cancel = new CancelDonationSubscription();
        $cancel->code = $uuid1->toString();
        $cancel->email = $data['email'];
        $cancel->zip_code = $data['zip_code'];
        $cancel->used = false;
        $cancel->save();

        $appName = self::getAppName();

        \Mail::send('emails.cancel-confirm', ['data' => [
            'email'=>$cancel->email,
            'code'=>$cancel->code,
            'cancel_confirm_url'=>url()->to('/cancel-subscription/confirm')
        ]], function (Message $m) use ($appName, $data) {
            $domain = config('services.mailgun.domain');
            $m->from("noreply@{$domain}", config('app.name'));

            $subject = "{$appName} really wishes you'd reconsider";
            $m->to($data['email'], "Patron")->subject($subject);
        });

        return response()->json([
            'success'=>true
        ]);
    }

    public function cancelStripSubscription($customer, string $email, string $postal_code): bool {
        if(
            $email === $customer['email'] &&
            $postal_code === $customer['shipping']['address']['postal_code'])
        {
            foreach($customer['subscriptions']['data'] as $subscription)
            {
                $pull = Subscription::retrieve($subscription['id']);
                $pull->cancel();
            }
            return true;
        }

        return false;
    }

    public function confirmCancelSubscription(Request $request)
    {
        self::bootStrapStripe();

        $data = $request->all();
        $cancelInfo = CancelDonationSubscription::whereCode($data['code'])->first();
        $customers = Customer::all([
            "limit" => 1,
            'email'=> $cancelInfo->email
        ]);

        $cancelInfo->used = true;
        $cancelInfo->save();

        $appName = self::getAppName();

        if(count($customers['data']) > 0)
        {
            foreach($customers['data'] as $customer)
            {
                $found = self::cancelStripSubscription($customer, $cancelInfo->email, $cancelInfo->zip_code);
                if($found)
                {
                    \Mail::send('emails.cancel-confirmed', [], function (Message $m) use ($appName, $cancelInfo) {
                        $domain = config('services.mailgun.domain');
                        $m->from("noreply@{$domain}", config('app.name'));

                        $subject = "{$appName} hopes to see you back soon.";
                        $m->to($cancelInfo->email, "Patron")->subject($subject);
                    });

                    return response()->json([
                        'success'=>true
                    ]);
                }
            }

            return response()->json([
                'success'=>false
            ]);
        }
    }
}
