<?php

namespace App\Http\Controllers\API;

use Exception;
use App\Models\cr;
use App\Models\Business;
use Illuminate\Http\Request;
use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;

class BusinessAPIController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        try {
            $address = Business::with(['category'])->where('id_user', $request->user()->id)->first();
            return ResponseFormatter::success($address, 'Data Alamat berhasil diambil');
        } catch (Exception $error) {
            return ResponseFormatter::error([
                'message' => "Get Alamat Gagal",
                'error' => $error,
            ],  'Get Failed', 500);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $request->validate(
                [
                    'nama' => 'required',
                    'id_status' => 'required',
                    'deskripsi' => 'required',
                    'is_ambil_di_toko' => 'required',
                ],
            );
            $data = $request->all();

            $data['id_user'] = $request->user()->id;

           $result= Business::updateOrCreate(['id_user' => $data['id_user']], $data);

            BusinessCategoryAPIController::createDelete($request, $result->id);
            // dd( $result->id);
            $result = Business::with(['category'])->where('id_user', $request->user()->id)->first();
            // dd( $result->id);
            return ResponseFormatter::success(
                $result,
                'Business Updated',
            );
        } catch (Exception $error) {
            return ResponseFormatter::error(
                [
                    'message' => $error
                ],
                'Business Update Failed',
            );
        }
    }

}
