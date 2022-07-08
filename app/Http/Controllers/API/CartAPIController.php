<?php

namespace App\Http\Controllers\API;

use Exception;
use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Helpers\ResponseFormatter;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class CartAPIController extends Controller
{
    public function getMyCart(Request $request)
    {
        try {

            $idUser = $request->user()->id;
            $cart = Cart::where('id_user', $idUser)->with(['product'=> function ($query) {
                $query->with(['businesses','master_units', 'product_category.master_product_categories', 'product_files', 'product_discount' => function ($query) {
                    return $query->with('discounts')->whereHas('discounts', function ($q) {
                        $q->where('waktu_mulai', '<', Carbon::now())->where('waktu_berakhir', '>', Carbon::now());
                    });
                }]);
            }, 'user'])->orderBy('created_at', 'desc')->get();

            return ResponseFormatter::success($cart, "Get Cart Success");
        } catch (Exception $e) {
            return ResponseFormatter::error([
                'error' => $e->getMessage(),
            ], "Get Cart Failed");
        }
    }

    public function update(Request $request)
    {

        try {
            DB::beginTransaction();

            Validator::make($request->all(), [
                'id_produk' => 'required',
                'qyt'       => 'required',
            ]);
        
            $data = $request->all();
            $data['id_user'] = $request->user()->id;
            $cartResult =  Cart::updateOrCreate([
                'id_user' => $request->user()->id,
                'id_produk' => $request->id_produk
            ], $data);

            $cartResult = Cart::with(['product'=> function ($query) {
                $query->with(['businesses.users','master_units', 'product_category.master_product_categories', 'product_files', 'product_discount' => function ($query) {
                    return $query->with('discount')->whereHas('discount', function ($q) {
                        $q->where('waktu_mulai', '<', Carbon::now())->where('waktu_berakhir', '>', Carbon::now());
                    });
                }]);
            }, 'user'])->find($cartResult->id);
            DB::commit();

            return ResponseFormatter::success($cartResult, "Update Cart Success");
        } catch (Exception $e) {
            DB::rollBack();

            return ResponseFormatter::error([
                'error' => $e->getMessage(),
            ], "Update Cart Failed");
        }
    }

    public function delete(Request $request)
    {
        try {
            $request->validate([
                'id' => 'required',
            ]);

            $cartResult = Cart::where('id', $request->id)->delete();

            return ResponseFormatter::success($cartResult, "Delete Cart Success");
        } catch (Exception $e) {
            return ResponseFormatter::error([
                'error' => $e->getMessage(),
            ], "Delete Cart Failed");
        }
    }
}
