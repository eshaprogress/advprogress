<?php

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
        'plans'=>[
            // !!!! Prices are listed in cents, not dollars. !!!
            ['eq'=>10,  'amount'=>10*100,  'id'=>'donate_10_monthly',     'name'=>'Donate $10/month, Tier 1'],
            ['eq'=>15,  'amount'=>15*100,  'id'=>'donate_15_monthly',     'name'=>'Donate $15/month, Tier 2'],
            ['eq'=>50,  'amount'=>50*100,  'id'=>'donate_50_monthly',     'name'=>'Donate $50/month, Tier 3'],
            ['eq'=>75,  'amount'=>75*100,  'id'=>'donate_75_monthly',     'name'=>'Donate $75/month, Tier 4'],
            ['eq'=>100, 'amount'=>100*100, 'id'=>'donate_100_monthly',    'name'=>'Donate $100/month, Tier 5'],
            ['eq'=>1,   'amount'=>1*100,   'id'=>'donate_custom_monthly', 'name'=>'Donate $1 x Custom Amount / month, Tier 6']
        ]
    ],

];
