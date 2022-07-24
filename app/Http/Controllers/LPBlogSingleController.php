<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LPBlogSingleController extends Controller
{
    public function index()
    {
        return view('landing_pages.blog-single');
    }
}
