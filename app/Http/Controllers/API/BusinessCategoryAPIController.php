<?php

namespace App\Http\Controllers\API;

use Exception;
use Illuminate\Http\Request;
use App\Models\BusinessCategory;
use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Models\Business;

class BusinessCategoryAPIController extends Controller
{
    public function index(Request $request)
    {
        try {
            $idUsaha = $request->input('id_usaha');
            $categories = BusinessCategory::with(['category', 'usaha']);
            if ($idUsaha) {
                $categories = BusinessCategory::where('id_usaha', $idUsaha)->first();
            } else {
                $categories = BusinessCategory::get();
            }

            return ResponseFormatter::success($categories, 'Data Business berhasil diambil');
        } catch (Exception $error) {
            return ResponseFormatter::error([
                'message' => "Get Business Category Gagal",
                'error' => $error,
            ],  'Get Failed', 500);
        }
    }
    static function createDelete(Request $request, int $idUsaha)
    {
        try {
            if ($request->add_kategori_usaha) {
                $request->validate(
                    [
                        'add_kategori_usaha' => 'required|array',
                    ],
                );

                // dd('id Usaha'. $idUsaha);

                foreach ($request->add_kategori_usaha as $value=> $kategori) {
                    $checkCategory = BusinessCategory::where('id_usaha', $idUsaha)->where('id_master_kategori_usaha', $kategori)->first();
                    if(!$checkCategory){
                        BusinessCategory::create([
                            'id_usaha'=> $idUsaha,
                            'id_master_kategori_usaha'=>$kategori,
                        ]);   
                        // dump('create='. $value);
 
                    } 
                    // // dump('no create='. $value);

                }
            }
            if ($request->delete_kategori_usaha) {
                $request->validate(
                    [
                        'delete_kategori_usaha' => 'required|array',
                    ],
                );
                foreach ($request->delete_kategori_usaha as $value=> $kategori) {
                    $checkCategory = BusinessCategory::where('id_usaha', $idUsaha)->where('id_master_kategori_usaha', $kategori)->delete();
                }
            }

        } catch (Exception $error) {
            return ResponseFormatter::error(
                [
                    'message' => $error
                ],
                'Business Category Update Failed',
            );
        }
    }
    public function destroy(Request $request)
    {
        try {
            $request->validate(
                [
                    'id' => 'required',
                ],
            );

            $result =  BusinessCategory::find($request->id)->delete();

            return ResponseFormatter::success(
                $result,
                'Business Category Updated',
            );
        } catch (Exception $error) {
            return ResponseFormatter::error(
                [
                    'message' => $error
                ],
                'Business Category Success',
            );
        }
    }
}
