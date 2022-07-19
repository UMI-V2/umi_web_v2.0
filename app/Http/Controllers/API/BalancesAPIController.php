<?php

namespace App\Http\Controllers\API;

use Response;
use Exception;
use App\Models\Balances;
use Illuminate\Http\Request;
use App\Helpers\ResponseFormatter;
use App\Repositories\BalancesRepository;
use App\Http\Controllers\AppBaseController;
use App\Http\Requests\API\CreateBalancesAPIRequest;
use App\Http\Requests\API\UpdateBalancesAPIRequest;
use App\Models\Business;

/**
 * Class BalancesController
 * @package App\Http\Controllers\API
 */

class BalancesAPIController extends AppBaseController
{
    public function getMyBalance(Request $request)
    {
        try {
            $myUser =  $request->user();
            $myBusiness = Business::where('id_user',   $myUser->id)->first();
            $pemasukan= Balances::where('id_user', $myUser->id)->where('id_usaha', $myBusiness->id)->sum('pemasukan');
            $pengeluaran= Balances::where('id_user',  $myUser->id)->where('id_usaha', $myBusiness->id)->sum('pengeluaran');
    

            return ResponseFormatter::success(
                [
                    "total_saldo" => $pemasukan - $pengeluaran,
                    "detail" => Balances::where('id_usaha', $myBusiness->id)->get(),
                ],
                "Get Balance Berhasil",
            );
        } catch (Exception $e) {
            return ResponseFormatter::error(
                $e->getMessage(),
                "Get Balance Failed",
            );
        }
    }


    public function add(Request $request)
    {
        try {
            $balance =  Balances::create([
                'id_user' => 100,
                'id_kategori_transaksi' => 1,
                'id_transaksi_penjualan' => 100,
                'id_usaha' => 100,
                'pengeluaran' => 0,
                'pemasukan' => 10000,
                'deskripsi' => 'Pembayaran pemesanan dengan no.pemesanan: $transaction->no_pemesanan'
            ]);
            return ResponseFormatter::success(
                $balance,
                "Add Balance Berhasil",
            );
        } catch (Exception $e) {
            return ResponseFormatter::error(
                $e->getMessage(),
                "Add Balance Failed",
            );
        }
    }
}
