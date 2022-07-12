<?php

namespace App\Http\Controllers\API;

use Response;
use Exception;
use App\Models\Rating;
use Illuminate\Http\Request;
use App\Helpers\ResponseFormatter;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use App\Models\TransactionProduct;

/**
 * Class RatingController
 * @package App\Http\Controllers\API
 */

class RatingAPIController extends Controller
{
    public function all(Request $request)
    {
        try {
            $limit = $request->input('limit', 10);
            $id = $request->input('id');
            $id_produk = $request->input('id_produk');
            $id_user = $request->input('id_user');

            if ($id) {
                $rating = Rating::with('user_author')->find($id);
                if ($rating) {
                    return ResponseFormatter::success($rating, "Get specific rating Success");
                } else {
                    return ResponseFormatter::error([
                        'message' => "Data rating tidak ditemukan"
                    ], "Get specific rating failed");
                }
            }
            $rating = Rating::with('user_author');
            if ($id_produk) {
                $rating->where('id_produk', $id_produk);
            }
            if ($id_user) {
                $rating->where('id_user_author', $id_user);
            }
            return ResponseFormatter::success($rating->paginate($limit), "Get Rating Success");
        } catch (Exception $e) {
            return ResponseFormatter::error([
                'error' => $e->getMessage(),
            ], "Get Rating Failed");
        }
    }

    public function update(Request $request)
    {

        try {
            DB::beginTransaction();

            Validator::make($request->all(), [
                'id_produk' => 'required',
                'id_transaksi_penjualan' => 'required',
                'id_transaksi_produk'=>'required',
                'is_show_name_author' => 'required',
                'rating' => 'required',
            ]);

            $data = $request->all();
            $data['id_user_author'] = $request->user()->id;

            $ratingResult =  Rating::updateOrCreate([
                'id_produk' => $request->id_produk,
                'id_transaksi_penjualan' => $request->id_transaksi_penjualan,
                'id_user_author'=>$request->user()->id,
            ], $data);

           $searchTransaction= TransactionProduct::where('id_transaksi_penjualan',  $request->id_transaksi_penjualan)->where('id_produk', $request->id_produk)->first();

           $searchTransaction->is_rating=true;
           $searchTransaction->save();

            $ratingResult = Rating::with(['user_author', 'transaction_product'])->find( $ratingResult->id);
            DB::commit();

            return ResponseFormatter::success($ratingResult, "Update Rating Success");
        } catch (Exception $e) {
            DB::rollBack();
            return ResponseFormatter::error([
                'error' => $e->getMessage(),
            ], "Update Rating Failed");
        }
    }

    public function delete(Request $request)
    {
        try {
            $request->validate([
                'id' => 'required',
            ]);

            $ratingResult = Rating::where('id', $request->id)->delete();

            return ResponseFormatter::success($ratingResult, "Delete Rating Success");
        } catch (Exception $e) {
            return ResponseFormatter::error([
                'error' => $e->getMessage(),
            ], "Delete Rating Failed");
        }
    }
}
