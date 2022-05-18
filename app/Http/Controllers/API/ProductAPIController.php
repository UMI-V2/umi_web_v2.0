<?php

namespace App\Http\Controllers\API;

use Response;
use Exception;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Helpers\ResponseFormatter;
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

            if ($id) {
                $value = Product::find($id);
                if ($value) {
                    return ResponseFormatter::success($value, 'Get Product Success');
                } else {
                    return ResponseFormatter::error(null, 'Get Product Not Found', 404);
                }
            }

            $value = Product::with(['master_units', 'product_category.master_product_categories']);


            if ($id_usaha) {
                $value->where('id_usaha', $id_usaha);
            }
            if ($nama) {
                $value->where('nama', 'like', '%' . $nama . '%');
            }
            if ($kondisi) {
                $value->where('kondisi', $kondisi);
            }
            if ($price_from) {
                $value->where('harga', '>=', $price_from);
            }
            if ($price_to) {
                $value->where('harga', '<=', $price_to);
            }


            return ResponseFormatter::success($value->paginate($limit), 'Get Products Success');
        } catch (Exception $e) {
            return ResponseFormatter::error([
                'error' => $e,
            ],  'Get Products Failed', 500);
        }
    }

    public function update(Request $request)
    {
        try {
            $data = $request->all();

            $result = Product::updateOrCreate(['id' => $data['id']], $data);

            ProductCategoryAPIController::createDelete($request, $result->id);

            ProductFileAPIController::uploadOrDeleteFile($request, $result->id);
            $value = Product::find($result->id);
            if ($request->id) {
                return ResponseFormatter::success($value->load(['master_units', 'product_category.master_product_categories']), 'Update Product Success');
            }
            return ResponseFormatter::success($value->load(['master_units', 'product_category.master_product_categories']), 'Add Product Success');

        } catch (Exception $e) {
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
