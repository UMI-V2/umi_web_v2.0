<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GeneralFileController extends Controller
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
