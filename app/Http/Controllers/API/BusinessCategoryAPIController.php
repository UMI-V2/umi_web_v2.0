<?php

namespace App\Http\Controllers\API;

use Exception;
use Illuminate\Http\Request;
use App\Models\BusinessCategory;
use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;

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

            return ResponseFormatter::success($categories, 'Data Alamat berhasil diambil');
        } catch (Exception $error) {
            return ResponseFormatter::error([
                'message' => "Get Business Category Gagal",
                'error' => $error,
            ],  'Get Failed', 500);
        }
    }
    public function store(Request $request)
    {
        try {
            $request->validate(
                [
                    'id_kategori_usaha' => 'required|array',
                    'id_usaha' => 'required',
                    'id_kategori_usaha' => 'required',
                ],
            );
            $data = $request->all();

            BusinessCategory::updateOrCreate(['id_usaha' => $request->id_usaha], $data);
            $result = BusinessCategory::with(['category', 'usaha'])->where('id_usaha', $request->id_usaha)->first();

            return ResponseFormatter::success(
                $result,
                'Business Category Updated',
            );
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
