<?php

namespace App\Http\Controllers\API;

use Exception;
use App\Models\Address;
use Illuminate\Http\Request;
use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;

class AddressAPIController extends Controller
{
    public function index(Request $request)
    {
        try {
            $address = Address::with(['province', 'city', 'subDistrict'])->where('id_user', $request->user()->id)->get();
            return ResponseFormatter::success($address, 'Data Alamat berhasil diambil');
        } catch (Exception $error) {
            return ResponseFormatter::error([
                'message' => "Get Alamat Gagal",
                'error' => $error,
            ],  'Get Failed', 500);
        }
    }


    public function store(Request $request)
    {
        try {
            $request->validate(
                [
                    'nama' => 'required',
                    'no_hp' => 'required',
                    'id_provinsi' => 'required',
                    'id_kota' => 'required',
                    'id_kecamatan' => 'required',
                    'alamat_lengkap' => 'required',
                    'patokan' => 'required',
                    'latitude' => 'required',
                    'longitude' => 'required',
                ],
            );
            $data = $request->all();

            $data['id_user'] = $request->user()->id;

            $result = Address::updateOrCreate(['id' => $request->id], $data);

            $searchAddress = Address::where('id', $request->id)->first();

            return ResponseFormatter::success(
                $searchAddress->load(['province', 'city', 'subDistrict']),
                'Address Updated',
            );
        } catch (Exception $error) {
            return ResponseFormatter::error(
                [
                    'message' => $error
                ],
                'Address Update fFailed',
            );
        }
    }

    #business


}
