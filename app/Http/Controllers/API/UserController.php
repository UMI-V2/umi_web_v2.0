<?php

namespace App\Http\Controllers\API;

use Exception;
use App\Models\User;
use Illuminate\Http\Request;
use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function get(Request $request)
    {
        try {
            return ResponseFormatter::success($request->user()->load('photo'), 'Data User berhasil diambil');
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
                $user->load('photo'),
                'Profile Updated',
            );
        } catch (Exception $error) {
            return ResponseFormatter::error([
                'message' => "Update profil gagal",
                'error' => $error,
            ],  'Update Failed', 500);
        }
    }
}
