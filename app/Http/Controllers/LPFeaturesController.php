<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LPFeaturesController extends Controller
{
    public function index()
    {
        return view('landing_pages.features');
    }
}
