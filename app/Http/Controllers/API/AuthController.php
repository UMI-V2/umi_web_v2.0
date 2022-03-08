<?php

namespace App\Http\Controllers\API;

use App\Models\User;
use Illuminate\Http\Request;
use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        try {
            $request->validate(
                [
                    'password' => 'required',
                    'nomor_hp_1' => 'required',
                ]
            );
            $user = User::query();

            $creadentials = request(['nomor_hp_1', 'password']);
            if (!Auth::attempt($creadentials)) {
                return ResponseFormatter::error([
                    'message' => "Nomor HP atau password tidak sesuai",
                ], 'Unauthorized', 500);
            }

            $user = User::with('photo')->where('nomor_hp_1', $request->nomor_hp_1)->first();

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
                'nomor_hp_1' => ['required', 'string', 'max:255', 'unique:users'],
                'password' => ['required', 'string'],
            ]);
            // dd($request->nama);
            User::create([
                'nama' => $request->nama,
                'tanggal_lahir' => $request->tanggal_lahir,
                'jenis_kelamin' => $request->jenis_kelamin,
                'nomor_hp_1' => $request->nomor_hp_1,
                'nomor_hp_2' => $request->nomor_hp_2,
                'kode_pos' => $request->kode_pos,
                'alamat' => $request->alamat,
                'pengalaman' => $request->pengalaman,

                'password' => Hash::make($request->password),
                'provider_auth' => $request->provider_auth,
            ]);

            $user = User::with('photo')->where('nomor_hp_1', $request->nomor_hp_1)->first();


            $tokenResult = $user->createToken('auth_token')->plainTextToken;

            if ($request->file_ktp || $request->file_selfie) {
                Auth::login($user, true);
                PhotoController::updateUserPhoto($request);
            }

            return ResponseFormatter::success([
                'access_token' => $tokenResult,
                'token_type' => 'Bearer',
                'user' => $user->load('photo'),
            ], 'Authenticated');
        } catch (Exception $error) {
            $userUserPhone = User::where('nomor_hp_1', $request->nomor_hp_1)->first();

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
            $nomorHp = $request->nomor_hp;
            $user = User::where('nomor_hp_1',  $nomorHp)->orWhere('nomor_hp_2', $nomorHp)->get();
            if($user->isNotEmpty()){
                return ResponseFormatter::error([
                    'message' => "Nomor HP telah digunakan",
                ],  'Nomor HP Not Ready', 500);
            }else{
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

}
