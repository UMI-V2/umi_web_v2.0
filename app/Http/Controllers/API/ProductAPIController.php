<?php

namespace App\Http\Controllers\API;

use Response;
use Exception;
use App\Models\Address;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Helpers\ResponseFormatter;
use Illuminate\Support\Facades\DB;
use App\Repositories\ProductRepository;
use App\Http\Controllers\AppBaseController;
use App\Http\Controllers\ProductFileController;
use App\Http\Requests\API\CreateProductAPIRequest;
use App\Http\Requests\API\UpdateProductAPIRequest;
use App\Http\Controllers\ProductCategoryController;
use App\Http\Controllers\API\ProductFileAPIController;
use App\Http\Controllers\API\ProductCategoryAPIController;

/**
 * Class ProductController
 * @package App\Http\Controllers\API
 */

class ProductAPIController extends AppBaseController
{
    public function __construct()
    {
        $this->request_only = (new Product)->getFillable();
    }

    public function all(Request $request)
    {
        try {
            $limit =  $request->input('limit', 20);
            $id = $request->input('id');
            $id_usaha = $request->input('id_usaha');
            $nama = $request->input('nama');
            $kondisi = $request->input('kondisi');
            $price_from = $request->input('price_from');
            $price_to = $request->input('price_to');
            $sort_price_low = $request->input('sort_price_low', 0);
            $sort_price_high = $request->input('sort_price_high', 0);


            //Set Distance Variabel
            $sort_distance = $request->input('sort_distance', 0);

            $latitude = $request->input('latitude', -6.399987);
            $longitude = $request->input('longitude', 108.284429);
            $distance = $request->input('distance', 100);

            $category_id = $request->input('category_id');
            $is_service = $request->input('is_service');
            $is_non_service = $request->input('is_non_service');



            if ($id) {
                $value = Product::with(['master_units', 'product_category.master_product_categories', 'product_files',])->find($id);
                if ($value) {
                    return ResponseFormatter::success($value, 'Get Product Success');
                } else {
                    return ResponseFormatter::error(null, 'Get Product Not Found', 404);
                }
            }

            $value = Product::query();

            // dd($value->get());

            if ($id_usaha) {
                $value->where('id_usaha', $id_usaha);
            }
            if ($nama) {
                $value->where('nama', 'like', '%' . $nama . '%');
            }
            if ($kondisi != null) {
                $value->where('kondisi',  $kondisi);
            }
            if ($category_id) {
                $value->whereHas('product_category', function ($q) use ($category_id) {
                    $q->where('id_master_kategori_produk', $category_id);
                });
            }
            if ($is_service) {
                $value->whereHas('product_category', function ($q) use ($category_id) {
                    $q->whereHas('master_product_categories', function ($q)  {
                        $q->where('status_kategori_produk', '1');
                    });
                });
            }
            if ($is_non_service) {
                $value->whereHas('product_category', function ($q) use ($category_id) {
                    $q->whereHas('master_product_categories', function ($q2)  {
                        $q2->where('status_kategori_produk', '0');
                    });
                });
            }
            if ($price_from) {
                $value->where('harga', '>=', $price_from);
            }
            if ($price_to) {
                $value->where('harga', '<=', $price_to);
            }

            if ($sort_price_low) {
                $value->orderBy("harga", "asc");
            }
            if ($sort_price_high) {
                $value->orderBy("harga", "desc");
            }

            // dd(  $value->get());

            if ($sort_distance) {
                $value->nearby([
                    $latitude, //latitude
                    $longitude //longitude
                ], $distance, 2)->selectDistance($this->request_only, 'distance')->closest();
            } else {
                $value->nearby([
                    $latitude, //latitude
                    $longitude //longitude
                ], $distance, 2)->selectDistance($this->request_only, 'distance');
            }


            return ResponseFormatter::success($value->with(['master_units', 'product_category.master_product_categories', 'product_files'])->paginate($limit), 'Get Products Success');
        } catch (Exception $e) {
            return ResponseFormatter::error([
                'error' => $e,
            ],  'Get Products Failed', 500);
        }
    }

    public function update(Request $request)
    {
        DB::beginTransaction();

        try {
            $data = $request->all();

            if (!$request->id) {
                //auto insert latitude katika pertama kali create produk
                $businessAddress = Address::where('id_users', $request->user()->id)->where('is_usaha', 1)->first();

                $data['latitude'] =   $businessAddress->latitude;
                $data['longitude'] =  $businessAddress->longitude;
            }

            $result = Product::updateOrCreate(['id' => $request->id], $data);

            // ProductCategoryAPIController::createDelete($request, $result->id);

            ProductFileAPIController::uploadOrDeleteFile($request, $result);
            $value = Product::find($result->id);
            DB::commit();

            if ($request->id) {
                return ResponseFormatter::success($value->load(['master_units', 'product_category.master_product_categories', 'product_files']), 'Update Product Success');
            }
            return ResponseFormatter::success($value->load(['master_units', 'product_category.master_product_categories', 'product_files']), 'Add Product Success');
        } catch (Exception $e) {
            DB::rollBack();

            return ResponseFormatter::error([
                'error' => $e,
            ],  'Update Product Failed', 500);
        }
    }

    public function delete(Request $request)
    {
        try {
            $this->validate($request, [
                'id' => 'required',
            ]);

            $value = Product::find($request->id)->delete();

            return ResponseFormatter::success($value, 'Delete Product Success');
        } catch (Exception $e) {
            return ResponseFormatter::error([
                'error' => $e,
            ],  'Delete Product Failed', 500);
        }
    }
}
