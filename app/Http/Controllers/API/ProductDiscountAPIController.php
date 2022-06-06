<?php

namespace App\Http\Controllers\API;

use Exception;
use App\Models\Discount;
use Illuminate\Http\Request;
use App\Models\ProductDiscount;
use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;

class ProductDiscountAPIController extends Controller
{
    static function createDelete(Request $request, $discount_id)
    {
        try {
            if ($request->add_discount_products) {

                // {
                //     'add_discount_products' : [
                //         {
                //             'id_produk': 1,
                //             'harga_diskon': 1000
                //             'batas_pembelian': 2
                //         }
                //     ]
                // }
                // dd($request);

                $request->validate(
                    [
                        'add_discount_products' => 'required|array',
                    ],
                );

                // dd('id Usaha'. $idUsaha);

                foreach ($request->add_discount_products as $value=> $productDiscount) {
                    // $checkDiscount = ProductDiscount::where('id_discount', $discount_id)->where('id_product', $product_Id)->first();

                    // dd($discount_id);
                    ProductDiscount::updateOrCreate([
                        'id_product'=> $productDiscount['id_product'],
                        'id_discount'=>$discount_id,
                    ],[
                        'id_product'=> $productDiscount['id_product'],
                        'id_discount'=>$discount_id,
                        'harga_diskon'=> $productDiscount['harga_diskon'],
                        'batas_pembelian'=>$productDiscount['batas_pembelian']
                    ]);  
                }
            }
            if ($request->delete_discount_products) {
                $request->validate(
                    [
                        'delete_discount_products' => 'required|array',
                    ],
                );
                foreach ($request->delete_discount_products as $value=> $product_id) {
                     ProductDiscount::where('id_product', $product_id)->where('id_discount',  $discount_id)->delete();
                }
            }

        } catch (\Exception $error) {
            throw new Exception("Error Processing Request", 1);
            
            // return ResponseFormatter::error(
            //     [
            //         'error'=> $error
            //     ],
            //     'Product Discount Update Failed',
            // );
        }
    }
}
