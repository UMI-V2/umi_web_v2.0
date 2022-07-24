<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LPBlogController extends Controller
{
    public function index()
    {
        return view('landing_pages.blog');
    }
}
