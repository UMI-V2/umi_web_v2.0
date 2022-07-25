<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LPPricingController extends Controller
{
    public function index()
    {
        return view('landing_pages.pricing');
    }
}
