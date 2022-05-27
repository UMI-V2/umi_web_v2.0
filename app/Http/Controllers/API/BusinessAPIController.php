<?php

namespace App\Http\Controllers\API;

use Exception;
use App\Models\cr;
use App\Models\Address;
use App\Models\Business;
use Illuminate\Http\Request;
use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Http\Controllers\BusinessFileController;

class BusinessAPIController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function all(Request $request)
    {
        try {
            // -6.408376, 108.281418
            $limit = $request->input('limit', 20);
            $business_id = $request->input('business_id');
            $nama_usaha = $request->input('nama_usaha');
            $sort_distance = $request->input('sort_distance');
            $latitude = $request->input('latitude', -6.408376);
            $longitude = $request->input('longitude', 108.281418);
            $distance = $request->input('distance', 1000);
            $category_id = $request->input('category_id');

            if ($business_id) {
                return ResponseFormatter::success(Business::with(['category.master_business_categories', 'masterStatusBusinesses', 'business_file', 'open_hours', 'address' => function ($query){
                    return $query->where('is_usaha', 1);
                }])->find($business_id), 'Data Usaha berhasil diambil');
            }

            $addresses = Address::query();
            $addresses->where('is_usaha', 1);

            $addresses->whereHas('business', function ($q) use ($nama_usaha, $category_id) {
                $q->where('id_master_status_usaha', 1);
                if ($nama_usaha) {
                    $q->where('nama_usaha', 'like', '%' . $nama_usaha . '%');
                }     
            });
            if($category_id){   
                $addresses->whereHas('business.category', function ($q) use ($category_id) {
                    $q->where('id_master_kategori_usaha', $category_id);            
                });
            }
            $addresses->nearby([
                $latitude, //latitude
                $longitude //longitude
            ], $distance, 2)->selectDistance([
                'id_users',
                'latitude',
                'longitude'
            ], 'distance');

            if ($sort_distance) {
                $addresses->closest();
            }
            return ResponseFormatter::success($addresses->with(['business.category'])->paginate($limit), 'Data Usaha berhasil diambil');
        } catch (Exception $error) {
            return ResponseFormatter::error([
                'message' => "Get Usaha Gagal",
                'error' => $error,
            ],  'Get Failed', 500);
        }
    }
    public function index(Request $request)
    {
        try {
            $business = Business::with(['category.master_business_categories', 'masterStatusBusinesses', 'business_file', 'open_hours'])->where('id_user', $request->user()->id)->first();
            return ResponseFormatter::success($business, 'Data Usaha berhasil diambil');
        } catch (Exception $error) {
            return ResponseFormatter::error([
                'message' => "Get Usaha Gagal",
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
                    'nama_usaha' => 'required',
                    'deskripsi' => 'required',
                    'is_ambil_di_toko' => 'required',
                ],
            );
            $data = $request->all();

            $data['id_user'] = $request->user()->id;

            $result = Business::updateOrCreate(['id_user' => $data['id_user']], $data);

            BusinessCategoryAPIController::createDelete($request, $result->id);

            BusinessFileAPIController::uploadOrDeleteFile($request, $result->id);
            // dd( $result->id);
            $result = Business::with(['category.master_business_categories', 'masterStatusBusinesses', 'business_file', 'open_hours'])->where("id", $result->id)->first();
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

    static  function calculateDistanceBetweenTwoAddresses($lat1, $lng1, $lat2, $lng2)
    {
        $lat1 = deg2rad($lat1);
        $lng1 = deg2rad($lng1);

        $lat2 = deg2rad($lat2);
        $lng2 = deg2rad($lng2);

        $delta_lat = $lat2 - $lat1;
        $delta_lng = $lng2 - $lng1;

        $hav_lat = (sin($delta_lat / 2)) ** 2;
        $hav_lng = (sin($delta_lng / 2)) ** 2;

        $distance = 2 * asin(sqrt($hav_lat + cos($lat1) * cos($lat2) * $hav_lng));

        $distance = 6371 * $distance;
        // If you want calculate the distance in miles instead of kilometers, replace 6371 with 3959.

        return $distance;
    }
}
