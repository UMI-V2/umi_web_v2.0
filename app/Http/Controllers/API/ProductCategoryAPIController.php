<?php

namespace App\Http\Controllers\API;

use Response;
use Exception;
use Illuminate\Http\Request;
use App\Models\ProductCategory;
use App\Helpers\ResponseFormatter;
use App\Http\Controllers\AppBaseController;
use App\Repositories\ProductCategoryRepository;
use App\Http\Requests\API\CreateProductCategoryAPIRequest;
use App\Http\Requests\API\UpdateProductCategoryAPIRequest;

/**
 * Class ProductCategoryController
 * @package App\Http\Controllers\API
 */

class ProductCategoryAPIController extends AppBaseController
{
    public function index(Request $request)
    {
        try {
            $idProduct = $request->input('id_produk');
            $categories = ProductCategory::with(['products', 'master_product_categories']);
            if ($idProduct) {
                $categories = ProductCategory::where('id_produk', $idProduct)->first();
            } else {
                $categories = ProductCategory::get();
            }

            return ResponseFormatter::success($categories, 'Data Product Category berhasil diambil');
        } catch (Exception $error) {
            return ResponseFormatter::error([
                'message' => "Get Product Category Gagal",
                'error' => $error,
            ],  'Get Failed', 500);
        }
    }
    static function createDelete(Request $request, int $idProduct)
    {
        try {
            if ($request->add_kategori_produk) {
                $request->validate(
                    [
                        'add_kategori_produk' => 'required|array',
                    ],
                );

                // dd('id Usaha'. $idUsaha);

                foreach ($request->add_kategori_produk as $value=> $kategori) {
                    $checkCategory = ProductCategory::where('id_produk', $idProduct)->where('id_master_kategori_produk', $kategori)->first();
                    if(!$checkCategory){
                        ProductCategory::create([
                            'id_produk'=> $idProduct,
                            'id_master_kategori_produk'=>$kategori,
                        ]);   
                        // dump('create='. $value);
 
                    } 
                    // // dump('no create='. $value);

                }
            }
            if ($request->delete_kategori_produk) {
                $request->validate(
                    [
                        'delete_kategori_produk' => 'required|array',
                    ],
                );
                foreach ($request->delete_kategori_produk as $value=> $kategori) {
                    $checkCategory = ProductCategory::where('id_produk', $idProduct)->where('id_master_kategori_produk', $kategori)->delete();
                }
            }

        } catch (Exception $error) {
            return ResponseFormatter::error(
                [
                    'message' => $error
                ],
                'Product Category Update Failed',
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

            $result =  ProductCategory::find($request->id)->delete();

            return ResponseFormatter::success(
                $result,
                'Product Category Updated',
            );
        } catch (Exception $error) {
            return ResponseFormatter::error(
                [
                    'message' => $error
                ],
                'Product Category Success',
            );
        }
    }

}
