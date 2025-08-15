<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DonateController extends Controller
{
    public function index()
    {
        $causes = [
            'Youth Training Program',
            'Equipment Purchase',
            'Community Outreach',
        ];
        return view('donate', compact('causes'));
    }

    public function process(Request $request)
    {
        // Payment integration logic here
        // e.g., PayPal, Stripe, M-Pesa
        return back()->with('success', 'Thank you for your donation!');
    }
}
