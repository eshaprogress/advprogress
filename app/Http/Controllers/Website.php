<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe\Charge;
use Stripe\Customer;
use Stripe\Stripe;
use Stripe\Subscription;

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

    public function donationSubmit(Request $request)
    {
        Stripe::setApiKey(config('services.stripe.secret'));
        Stripe::setClientId(config('services.stripe.key'));
        Stripe::setApiVersion("2018-05-21");

        $plans = config('services.stripe.plans');
        $planHighestValue = array_map(function($val)
        {
            return $val['amount'];
        }, $plans);
        $planHighestValue = max($planHighestValue);

        $requestData = $request->all();
        $json = base64_decode($requestData['data']);
        $data = json_decode($json, true);
        $form = $data['form'];

        $customerStripeId = null;
        $customerStripeCardToken = null;
        $customer = Customer::all([
            "limit" => 1,
            'email'=>$form['email']
        ]);
        if(count($customer['data']) > 0)
        {
            $customerStripeId = $customer['data'][0]['id'];
            $customerStripeCardToken = $customer['data'][0]['default_source'];
        }
        else
        {
            $submitAccount = [
                'description' => "Customer for {$form['email']}",
                'email' => $form['email'],
                'source' => $data['stripeToken'],
                'shipping'=>[
                    'name'=>$data['name'],
                    'address'=>[
                        'line1'      =>$form['address'],
                        'city'       =>$form['city'],
                        'postal_code'=>$form['zip_code'],
                        'state'      =>$form['state']
                    ]
                ]
            ];
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

                Subscription::create($submitSubscription);
                return response()->json([
                    'success'=>true
                ]);

            case 'simple-donation':
                $format_charge_cost = number_format($amount);
                $submitCharge = [
                    "amount" => $amount * 100,
                    "currency" => "usd",
                    "source" => $data['cardToken'],
                    "description" => "Charge for {$form['email']} for: {$format_charge_cost}"
                ];

                Charge::create($submitCharge);
                return response()->json([
                    'success'=>true
                ]);
        }

        return response()->json($data);
    }
}
