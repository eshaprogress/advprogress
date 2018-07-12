<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \Stripe\Stripe;

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
        Stripe::setApiKey(config('app.stripe.secret'));

        return response()->json([$request->all()]);
    }
}
