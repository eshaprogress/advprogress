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
        $requestData = $request->all();
        $json = base64_decode($requestData['data']);
        $data = json_decode($json);
        return response()->json($data);
    }
}
