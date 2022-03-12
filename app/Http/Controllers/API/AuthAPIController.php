<?php

namespace App\Http\Controllers\API;

use Exception;
use App\Models\User;
use Illuminate\Http\Request;
use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthAPIController extends Controller
{
    public function login(Request $request)
    {
        try {
            $request->validate(
                [
                    'password' => 'required',
                    'no_hp' => 'required',
                ]
            );
            $user = User::query();

            $creadentials = request(['no_hp', 'password']);
            if (!Auth::attempt($creadentials)) {
                return ResponseFormatter::error([
                    'message' => "Nomor HP atau password tidak sesuai",
                ], 'Unauthorized', 500);
            }

            $user = User::where('no_hp', $request->no_hp)->first();

            $tokenResult = $user->createToken('authToken')->plainTextToken;


            return ResponseFormatter::success(
                [
                    'access_token' => $tokenResult,
                    'token_type' => 'Bearer',
                    'user' => $user,
                ],
                'Authenticated'
            );
        } catch (Exception $error) {
            $message = 'Authentication Failed';
            if (!$request->password) {
                $message = "Harap memasukan password";
            }
            return ResponseFormatter::error([
                'message' => $message,
                'error' => $error,
            ],  'Authentication Failed', 500);
        }
    }

    public function register(Request $request)
    {
        try {

            // $user = User::query();
            $request->validate([
                'no_hp' => ['required', 'string', 'max:255', 'unique:users'],
                'password' => ['required', 'string'],
            ]);
            // dd($request->nama);
          $user=  User::create([
                'name' => $request->name,
                'jenis_kelamin' => $request->jenis_kelamin,
                'tanggal_lahir' => $request->tanggal_lahir,
                'no_hp' => $request->no_hp,
                'password' => Hash::make($request->password),
            ]);


            $user->update([
                'username' => "user-".$user->id.rand(10,100),
            ]);
            $user = User::where('no_hp', $request->no_hp)->first();

            $tokenResult = $user->createToken('auth_token')->plainTextToken;


            return ResponseFormatter::success([
                'access_token' => $tokenResult,
                'token_type' => 'Bearer',
                'user' => $user,
            ], 'Authenticated');
        } catch (Exception $error) {
            $userUserPhone = User::where('no_hp', $request->no_hp)->first();

            if ($userUserPhone) {
                return ResponseFormatter::error([
                    'message' => "Nomor hp telah digunakan",
                    'error' => $error,
                ], 'Something went wrong', 500);
            }

            return ResponseFormatter::error([
                'message' => "Something went wrong",
                'error' => $error,
            ], 'Authentication Failed', 500);
        }
    }

    public function logout(Request $request)
    {

        $token = $request->user()->currentAccessToken()->delete();

        return ResponseFormatter::success($token, 'Token Revoked');
    }



    public function checkNoHp(Request $request)
    {
        try {
            $nomorHp = $request->no_hp;
            $user = User::where('no_hp',  $nomorHp)->get();
            if ($user->isNotEmpty()) {
                return ResponseFormatter::error([
                    'message' => "Nomor HP telah digunakan",
                ],  'Nomor HP Not Ready', 500);
            } else {
                return ResponseFormatter::success(
                    [
                        'message' => "Nomor Tersedia",
                    ],
                    'Nomor HP Ready'
                );
            }
        } catch (Exception $error) {
            return ResponseFormatter::error([
                'message' => "terjadi Kesalahan",
                'error' => $error,
            ],  'Get failed', 500);
        }
    }

    public function changePassword(Request $request)
    {
        try {

            $user = User::where('no_hp', $request->no_hp)->first();
            if ($request->password) {
                $user->update([
                    'password' => Hash::make($request->password),
                ]);
                return ResponseFormatter::success(
                    true,
                    'Password Berhasil Diubah',
                );
            }

           
        } catch (Exception $error) {
            return ResponseFormatter::error([
                'message' => "Ubah Passowrd gagal",
                'error' => $error,
            ],  'Update Failed', 500);
        }
    }
}
