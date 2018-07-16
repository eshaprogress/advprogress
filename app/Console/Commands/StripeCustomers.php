<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Stripe\Customer;
use Stripe\Stripe;

class StripeCustomers extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'stripe:customers {--customer-email=0}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Utility for getting customer info';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        Stripe::setApiKey(config('services.stripe.secret'));
        Stripe::setClientId(config('services.stripe.key'));
        Stripe::setApiVersion("2018-05-21");

        $customer_email = $this->option('customer-email');
        $customers = Customer::all([
            'limit'=>100,
            'email'=>$customer_email
        ]);
        foreach($customers->data as $customer)
            $this->line('[customer] '.json_encode($customer, JSON_PRETTY_PRINT));
    }
}
