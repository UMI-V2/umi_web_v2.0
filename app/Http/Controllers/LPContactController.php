<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LPContactController extends Controller
{
    public function index()
    {
        return view('landing_pages.contact');
    }
}
