<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Stripe\Plan;
use Stripe\Product;
use Stripe\Stripe;

class RegisterStripePlans extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'stripe:register_stripe_plans {--clear} {--install}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Creating all the require Stripe Plans';

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

        $clear = $this->option('clear');
        if($clear)
        {
            $this->line('Clearing Plans to Products');
            $plans = Plan::all(['limit'=>10]);
            foreach($plans->data as $plan)
            {
                $pull = Plan::retrieve($plan->id);
                $pull->delete();
            }

            $products = Product::all(['limit'=>10]);
            foreach($products->data as $product)
            {
                $pull = Product::retrieve($product->id);
                $pull->delete();
            }
        }

        $install = $this->option('install');
        if($install)
        {
            $this->line('Installing Plans to Products');
            $plans = config('services.stripe.plans');
            foreach($plans as $plan)
            {
                $this->line("Adding Plan: [id={$plan['id']}], [product={$plan['name']}], [amount={$plan['amount']}");
    //            continue;
                $plan = \Stripe\Plan::create([
                    "amount" => $plan['amount'],
                    "interval" => "month",
                    "product" => [
                        "name" => $plan['name']
                    ],
                    "currency" => "usd",
                    "id" => $plan['id']
                ]);
                $this->line(json_encode($plan));
            }
        }
    }
}
