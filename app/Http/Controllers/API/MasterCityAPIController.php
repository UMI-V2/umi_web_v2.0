<?php

namespace App\Http\Controllers\API;

use Exception;
use App\Models\MasterCity;
use Illuminate\Http\Request;
use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;

class MasterCityAPIController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        try {
            $request->validate(
                [
                    'province_id' => 'required',
                ]
            );
            $idProvince = $request->input("province_id");

            $master_cities = MasterCity::where("province_id", $idProvince)->get();
            return ResponseFormatter::success(
                $master_cities,
                'Master Cities retrieved successfully',
            );
        } catch (Exception $error) {
            return ResponseFormatter::error(
                [
                    "message"=> $error
                ],
                'Master Cities retrieved failed',
            );
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }
}
