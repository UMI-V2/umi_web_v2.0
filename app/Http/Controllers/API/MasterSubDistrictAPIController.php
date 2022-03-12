<?php

namespace App\Http\Controllers\API;

use Exception;
use Illuminate\Http\Request;
use App\Models\MasterSubDistrict;
use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;

class MasterSubDistrictAPIController extends Controller
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
                    'city_id' => 'required',
                ]
            );
            $idCity = $request->input("city_id");

            $subDistrict = MasterSubDistrict::where("city_id", $idCity)->get();
            return ResponseFormatter::success(
                $subDistrict,
                'Master Sub District retrieved successfully',
            );
        } catch (Exception $error) {
            return ResponseFormatter::error(
                [
                    "message"=> $error
                ],
                'Master Sub District retrieved failed',
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
