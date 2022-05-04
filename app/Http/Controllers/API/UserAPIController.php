<?php

namespace App\Http\Controllers\API;

use Exception;
use App\Models\User;
use Illuminate\Http\Request;
use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class UserAPIController extends Controller
{
    public function getMyUser(Request $request)
    {
        try {
            return ResponseFormatter::success($request->user()->load(['MasterPrivilege', 'MasterStatusUser']), 'Data User berhasil diambil');
        } catch (Exception $error) {
            return ResponseFormatter::error([
                'message' => "Update profil gagal",
                'error' => $error,
            ],  'Update Failed', 500);
        }
    }

    public function updateProfile(Request $request)
    {
        try {
            $data = $request->all();

            $user = $request->user();
            if ($request->password) {
                $user->update([
                    'password' => Hash::make($request->password),
                ]);
                return ResponseFormatter::success(
                    $user,
                    'Change password Sukses',
                );
            }
            $user->update($data);  

            return ResponseFormatter::success(
                $user->load(['MasterPrivilege', 'MasterStatusUser']),
                'Profile Updated',
            );
        } catch (Exception $error) {
            return ResponseFormatter::error([
                'message' => "Update profil gagal",
                'error' => $error,
            ],  'Update Failed', 500);
        }
    }

    public function updatePhotoProfile(Request $request)
    {
        $validator  = Validator::make($request->all(), [
            'file' => 'required|image'
        ],);
        if ($validator->fails()) {
            return ResponseFormatter::error(
                [
                    'message'=>"Gagal upload file",
                    'error' => $validator->errors()
                ],
                'update photo fails',
                401
            );
        }
        if ($request->file('file')) {
            

            $file = $request->file->store('assets/user', 'public');     

            $user = $request->user();
            $lastFile = $user->profile_photo_path;
            $user->profile_photo_path = $file;
            $user->update();

            if($lastFile){
                if(Storage::disk('public')->exists($lastFile)){
                    Storage::disk('public')->delete($lastFile);
                }
            }

            return ResponseFormatter::success($user->load(['MasterPrivilege', "MasterStatusUser"]), 'File successfully uploaded');
        }
    }
}
