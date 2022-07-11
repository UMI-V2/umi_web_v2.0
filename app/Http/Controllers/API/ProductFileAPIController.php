<?php

namespace App\Http\Controllers\API;

use Response;
use Exception;
use App\Models\ProductFile;
use Illuminate\Http\Request;
use App\Helpers\ResponseFormatter;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\AppBaseController;
use App\Repositories\ProductFileRepository;
use App\Http\Requests\API\CreateProductFileAPIRequest;
use App\Http\Requests\API\UpdateProductFileAPIRequest;
use App\Models\Product;

/**
 * Class ProductFileController
 * @package App\Http\Controllers\API
 */

class ProductFileAPIController extends AppBaseController
{
    static function uploadOrDeleteFile(Request $request, Product $product, )
    {
        try {
            if ($request->add_file_photos) {
                foreach ($request->file('add_file_photos') as $file) {
                    $fileRoot = $file->store("assets/business/$product->id_usaha/products", 'public');
                    // dd($fileRoot);
                   $productFile= ProductFile::create([
                        'id_produk' => $product->id,
                        'file' => $fileRoot,
                        'video' => false,
                        'photo' => true
                    ]);
                }
            }
    
            if ($request->delete_files) {
                foreach ($request->delete_files as $photo) {
                    ProductFile::where('file', $photo)->delete();
                    if (Storage::disk('public')->exists($photo)) {
                        Storage::disk('public')->delete($photo);
                    }
                }
            }
        } catch (Exception $e) {
            return ResponseFormatter::error(
                [
                    'message' => $e
                ],
                'Upload Product File Failed',
            );
        }
        
    }
}
