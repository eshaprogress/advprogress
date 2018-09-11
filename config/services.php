<?php

$buildPlans = function()
{
    $amounts = [18,27,45,99,245];

    $plans = [];
    $tier = 0;
    foreach($amounts as $idx=>$amount)
    {
        $tier = $idx+1;
        $plans[] = [
            'eq'    =>$amount,
            'amount'=>$amount*100,
            'id'    =>"donate_{$amount}_monthly",
            'name'  =>'Donate $'.$amount.'/month, Tier '.$tier,
            'key'   =>(string)$amount
        ];
    }
    $tier++;
    $plans[] = [
        'eq'=>1,
        'amount'=>1*100,
        'id'=>'donate_custom_monthly',
        'name'=>"Donate $1 x Custom Amount / month, Tier {$tier}",
        'key'=>'custom'
    ];

    return $plans;
};

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Stripe, Mailgun, SparkPost and others. This file provides a sane
    | default location for this type of information, allowing packages
    | to have a conventional place to find your various credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
    ],

    'ses' => [
        'key' => env('SES_KEY'),
        'secret' => env('SES_SECRET'),
        'region' => env('SES_REGION', 'us-east-1'),
    ],

    'sparkpost' => [
        'secret' => env('SPARKPOST_SECRET'),
    ],

    'stripe' => [
        'model' => App\Models\User::class,
        'key' => env('STRIPE_KEY'),
        'secret' => env('STRIPE_SECRET'),
        'plans'=>$buildPlans()
    ],

];
