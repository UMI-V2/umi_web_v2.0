<?php

namespace App\Http\Controllers\API;

use Response;
use Exception;
use App\Models\BusinessFile;
use Illuminate\Http\Request;
use App\Helpers\ResponseFormatter;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\AppBaseController;
use App\Repositories\BusinessFileRepository;
use App\Http\Requests\API\CreateBusinessFileAPIRequest;
use App\Http\Requests\API\UpdateBusinessFileAPIRequest;

/**
 * Class BusinessFileController
 * @package App\Http\Controllers\API
 */

class BusinessFileAPIController extends AppBaseController
{
    static function uploadOrDeleteFile(Request $request, String $idUsaha)
    {
        try {
            if ($request->add_file_photos) {
                foreach ($request->file('add_file_photos') as $file) {
                    $fileRoot = $file->store("assets/business/$idUsaha/photos", 'public');
                    BusinessFile::create([
                        'id_usaha' => $idUsaha,
                        'file' => $fileRoot,
                        'is_video' => false,
                        'is_photo' => true
                    ]);
                }
            }
    
            if ($request->delete_files) {
                foreach ($request->delete_files as $photo) {
                    BusinessFile::where('file', $photo)->delete();
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
                'Upload Business File Failed',
            );
        }
        
    }
}
