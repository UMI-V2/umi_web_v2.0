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
            $address = Address::with(['master_provinces', 'cities', 'sub_districts'])->where('id_users', $request->user()->id)->get();
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
                    'province_id' => 'required',
                    'city_id' => 'required',
                    'subdistrict_id' => 'required',
                    'alamat_lengkap' => 'required',
                    'patokan' => 'required',
                    'latitude' => 'required',
                    'longitude' => 'required',
                ],
            );
            $data = $request->all();

            $data['id_users'] = $request->user()->id;
            $addreses = Address::where('id_users', $request->user()->id)->get();
            if ($addreses->isEmpty()) {
                $data['is_alamat_utama'] = true;
            }
            if ($request->is_usaha) {
                foreach ($addreses as $key => $address) {
                    if ($address->is_usaha == true) {
                        $address->is_usaha = false;
                        $address->update();
                    }
                }
            }
            if ($request->is_alamat_utama) {
                foreach ($addreses as $key => $address) {
                    if ($address->is_alamat_utama == true) {
                        $address->is_alamat_utama = false;
                        $address->update();
                    }
                }
            }
            $result = Address::updateOrCreate(['id' => $request->id], $data);

            $searchAddress = Address::where('id', $result->id)->first();
            

            return ResponseFormatter::success(
                $searchAddress->load(['master_provinces', 'cities', 'sub_districts']),
                'Address Updated',
            );
        } catch (Exception $error) {
            return ResponseFormatter::error(
                [
                    'message' => $error
                ],
                'Address Update Failed',
            );
        }
    }

    #business

    public function delete(Request $request)
    {
        try {
            Address::where('id', $request->id)->delete();
            return ResponseFormatter::success(
                true,
                'Address Deleted',
            );
        } catch (Exception $error) {
            return ResponseFormatter::error(
                [
                    'message' => $error
                ],
                'Delete Address Failed',
            );
        }
    }
}
