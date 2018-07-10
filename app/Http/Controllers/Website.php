<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        return response()->json([$request->all()]);
    }
}
