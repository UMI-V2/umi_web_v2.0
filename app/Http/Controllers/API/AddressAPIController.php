<?php

namespace App\Http\Controllers\API;

use Exception;
use App\Models\Address;
use Illuminate\Http\Request;
use App\Helpers\ResponseFormatter;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Business;
use App\Models\Product;

class AddressAPIController extends Controller
{
    public function index(Request $request)
    {
        try {
            $address = Address::with(['province', 'city', 'sub_district'])->where('id_users', $request->user()->id)->orderBy("updated_at", "desc")->get();
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
        DB::beginTransaction();

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

                    //update Data Business
                    $businessUpdate = Business::where('id_user', $request->user()->id)->first();
                    if ($businessUpdate) {
                        $businessUpdate->latitude = $request->latitude;
                        $businessUpdate->longitude = $request->longitude;
                        $businessUpdate->update();
                        //Update latitude & Longtidue di data produk
                        $productUpdate = Product::where('id_usaha',$businessUpdate->id )->get();
                        foreach ( $productUpdate as $key => $value) {
                            $value->latitude = $request->latitude;
                            $value->longitude =  $request->longitude;
                            $value->update();
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

            DB::commit();

            return ResponseFormatter::success(
                $searchAddress->load(['province', 'city', 'sub_district']),
                'Address Updated',
            );
        } catch (Exception $error) {
            DB::rollBack();

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
