<?php

namespace App\Http\Controllers\API;

use Exception;
use Illuminate\Http\Request;
use App\Models\WithdrawBalance;
use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Models\Business;
use App\Models\MasterBank;
use Illuminate\Support\Facades\Validator;

class WithdrawBalanceAPIController extends Controller
{
    public function all(Request $request)
    {
        try {
            $id = $request->input('id');
            $status = $request->input('status');
            $isMy = $request->input('isMy');

            if ($id) {
                $value = WithdrawBalance::find($id);
                if ($value) {
                    return ResponseFormatter::success($value, "Get Withdraw Balance Success");
                } else {
                    return ResponseFormatter::error([
                        'message' => "Data courier tidak ditemukan"
                    ], "Get courier failed");
                }
            }
            $value = WithdrawBalance::query();


            if($status){
                $value->where('status', 'like', '%' . $status . '%');
            }
            if($isMy){
                // dd($request->user()->id);
                $value->where('id_user', $request->user()->id);
            }

            return ResponseFormatter::success($value->orderBy('created_at', 'desc')->get(), "Get Withdraw Balance Success");
        } catch (Exception $e) {
            return ResponseFormatter::error([
                'error' => $e->getMessage(),
            ], "Get Withdraw Balance Failed");
        }
    }

    public function addRequest(Request $request)
    {
        try {
            Validator::make($request->all(), [
                'id_bank' => 'required',
                'nominal' => 'required',
                'no_rek' => 'required',
                'rek_name' => 'required',
            ],);
            $data = $request->all();

            $user = $request->user();
            $business = Business::where('id_user', $user->id)->first();
            $data['id_user'] = $user->id;
            $data['id_usaha'] = $business->id;

            if($business->total_saldo < $request->nominal){
                return ResponseFormatter::error(
                    [
                        'message' => 'Maaf, saldo anda tidak mencukupi',
                    ],
                    'Withdraw Balance Add Request Failed',
                );
            }

            $checkPendingRequest = WithdrawBalance::where('id_user', $user->id)->where('status', 'pending')->orWhere('status', 'onprogress')->get();
            if ($checkPendingRequest->isNotEmpty()) {
                return ResponseFormatter::error(
                    [
                        'message' => 'Maaf, mohon tunggu proses yang sedang berlangsung terlebih dahulu',
                    ],
                    'Withdraw Balance Add Request Failed',
                );
            }

            $bank = MasterBank::find($request->id_bank);
            $data['bank_name'] = $bank->name;
            $data['cost_admin'] = $bank->cost_admin;

            $result = WithdrawBalance::updateOrCreate(
                [
                    'id' => $request->id,
                ],
                $data
            );
            $result = WithdrawBalance::find( $result->id);
            return ResponseFormatter::success(
                $result,
                'Withdraw Balance Add Request Success',
            );
        } catch (Exception $error) {
            return ResponseFormatter::error([
                'message' => "Withdraw Balance Add Request gagal",
                'error' => $error->getMessage(),
            ],  'Withdraw Balance Add Request Failed', 500);
        }
    }


    public function delete(Request $request)
    {

        try {
            Validator::make($request->all(), [
                'id' => 'required',
            ],);

            $result = WithdrawBalance::where('id', $request->id)->delete();

            return ResponseFormatter::success(
                $result,
                'Courier Delete Success',
            );
        } catch (Exception $error) {
            return ResponseFormatter::error([
                'message' => "Delete Courier Failed",
                'error' => $error,
            ],  'Delete Courier Failed', 500);
        }
    }
}
