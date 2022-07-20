<?php

namespace App\Http\Controllers;

use App\Models\Address;
use Illuminate\Http\Request;

class LandingPagesController extends Controller
{
    public function index()
    {
        $alamats = Address::all();
        $alamatToko = [];
        foreach ($alamats as $alamat) {
            $temp = $alamat->toArray();
            $alamatToko[] = array(
                array_values($temp)[5],
                array_values($temp)[13],
                array_values($temp)[14],
            );
        }

        return view('landing_pages.index', compact('alamatToko'));
    }
}
