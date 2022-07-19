<?php

namespace App\Http\Controllers\API;

use Exception;
use App\Models\MasterBank;
use Illuminate\Http\Request;
use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;

class MasterBankAPIController extends Controller
{
    public function all(Request $request)
    {
        try {
            $id = $request->input('id');
            $name = $request->input('name');

            if ($id) {
                $value = MasterBank::find($id);
                if ($value) {
                    return ResponseFormatter::success($value, "Get Master Bank Success");
                } else {
                    return ResponseFormatter::error([
                        'message' => "Data courier tidak ditemukan"
                    ], "Get courier failed");
                }
            }
            $value = MasterBank::query();


            if($name){
                $value->where('name', 'like', '%' . $name . '%'); 
            }

            return ResponseFormatter::success($value->orderBy('name', 'asc')->get(), "Get Master Bank Success");
        } catch (Exception $e) {
            return ResponseFormatter::error([
                'error' => $e->getMessage(),
            ], "Get Master Bank Failed");
        }
    }
}
