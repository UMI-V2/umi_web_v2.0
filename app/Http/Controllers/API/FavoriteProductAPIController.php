<?php

namespace App\Http\Controllers\API;

use Exception;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\FavoriteProduct;
use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;

class FavoriteProductAPIController extends Controller
{
    public function all(Request $request)
    {
        try {
            $id = $request->input('id');
            $id_user = $request->input('id_user');
            $id_product = $request->input('id_product');
            $isMy = $request->input('isMy');


            if ($id) {
                $value = FavoriteProduct::with(['product'=> function ($query) {
                    $query->with(['businesses','master_units', 'product_category.master_product_categories', 'product_files', 'product_discount' => function ($query) {
                        return $query->with('discounts')->whereHas('discounts', function ($q) {
                            $q->where('waktu_mulai', '<', Carbon::now())->where('waktu_berakhir', '>', Carbon::now());
                        });
                    }]);
                }])->find($id);
                if ($value) {
                    return ResponseFormatter::success($value, "Get Favorite Success");
                } else {
                    return ResponseFormatter::error([
                        'message' => "Data Favorite tidak ditemukan"
                    ], "Get Favorite failed");
                }
            }
            $value = FavoriteProduct::with(['product'=> function ($query) {
                $query->with(['businesses','master_units', 'product_category.master_product_categories', 'product_files', 'product_discount' => function ($query) {
                    return $query->with('discounts')->whereHas('discounts', function ($q) {
                        $q->where('waktu_mulai', '<', Carbon::now())->where('waktu_berakhir', '>', Carbon::now());
                    });
                }]);
            }]);

            if($id_user){
                $value->where('id_user', $id_user);
            }
            if($id_product){
                $value->where('id_product', $id_product);
            }

            if($isMy){
                $value->where('id_user', $request->user()->id);
            }

            return ResponseFormatter::success($value->orderBy('created_at', 'desc')->get(), "Get Favorite Success");
        } catch (Exception $e) {
            return ResponseFormatter::error([
                'error' => $e->getMessage(),
            ], "Get Favorite Failed");
        }
    }


    public function update(Request $request)
    {
        try {
            $request->validate([
                'id_product' => 'required',
            ]);
            $data = $request->all();

           $result =  FavoriteProduct::updateOrCreate([
                'id_user' => $request->user()->id,
                'id_product' => $request->id_product,
            ], $data);

            $result = FavoriteProduct::find($result->id);

            return ResponseFormatter::success($result, "Update Favorite Success");
        } catch (Exception $e) {
            return ResponseFormatter::error([
                'error' => $e,
            ], "Update Favorite Failed");
        }
    }

    public function delete(Request $request)
    {
        try {
            $request->validate([
                'id_product' => 'required',
            ]);

            $result = FavoriteProduct::where('id_product', $request->id_product)->where('id_user', $request->user()->id)->delete();

            return ResponseFormatter::success($result, "Delete Favorite Success");
        } catch (Exception $e) {
            return ResponseFormatter::error([
                'error' => $e,
            ], "Delete Favorite Failed");
        }
    }


}
