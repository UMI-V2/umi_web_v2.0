<?php

namespace App\Http\Controllers\API;

use Response;
use Exception;
use Carbon\Carbon;
use Midtrans\Snap;
use Midtrans\Config;
use Midtrans\Transaction;
use Illuminate\Http\Request;
use App\Models\SalesTransaction;
use App\Models\TransactionStatus;
use App\Helpers\ResponseFormatter;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\AppBaseController;

/**
 * Class SalesTransactionController
 * @package App\Http\Controllers\API
 */

class SalesTransactionAPIController extends AppBaseController
{
    // 'Menunggu Konfirmasi', 'Menunggu Pembayaran','Sedang Disiapkan', 'Telah Dikirimkan', 'Talah Diterima', 'Dibatalkan'

    public function all(Request $request)
    {
    }
    public function update(Request $request)
    {
    }

    public function checkout(Request $request)
    {

        DB::beginTransaction();
        Validator::make($request->all(), [
            'id_usaha' => 'required|exists:businesses,id',
            'subtotal_produk' => 'required',
            'subtotal_ongkir' => 'required',
            'diskon' => 'required',
            'biaya_penanganan' => 'required',
            'total_pesanan' => 'required',
            'is_delivery' => 'required',
            'is_manual_payment' => 'required',
            'is_auto_payment' => 'required',
            'products' => 'raquired|array',
        ]);

        // $request->validate([
        //     'id_usaha' => 'required|exists:businesses,id',
        //     'subtotal_produk' => 'required',
        //     'subtotal_ongkir' => 'required',
        //     'diskon' => 'required',
        //     'biaya_penanganan' => 'required',
        //     'total_pesanan' => 'required',
        //     'is_delivery' => 'required',
        //     'is_manual_payment' => 'required',
        //     'is_auto_payment' => 'required',
        //     'products' => 'raquired|array',
        // ]);



        $transaction = SalesTransaction::create([
            'id_user' => $request->user()->id,
            'id_usaha' => $request->id_usaha,
            'no_pemesanan' => '',
            'subtotal_produk' => $request->subtotal_produk,
            'subtotal_ongkir' => $request->subtotal_ongkir,
            'diskon' => $request->diskon,
            'biaya_penanganan' => $request->biaya_penanganan,
            'total_pesanan' => $request->total_pesanan,
            'is_delivery' => $request->is_delivery,
            'is_manual_payment' => $request->is_manual_payment,
            'is_auto_payment' => $request->is_auto_payment,
            'message' => $request->message
        ]);



        $transaction = SalesTransaction::with(['users'])->find($transaction->id);
        // dd($transaction);
        $no_pesanan = Carbon::now()->timestamp . "$transaction->id";

        try {
            TransactionProductAPIController::addProduct($request,  $transaction->id);
            TransactionStatus::updateOrCreate([
                'id_transaksi_penjualan' => $transaction->id,
            ], [
                'status' => 'Menunggu Konfirmasi',
                'tanggal_pesanan_dibuat' => Carbon::now()->format('Y-m-d H:i:s'),

            ]);
            $transaction->no_pemesanan = $no_pesanan;
            $transaction->save();

            DB::commit();

            return ResponseFormatter::success(
                $transaction->load(['users', 'transaction_status', 'products_detail']),
                "Transaksi Berhasil",
            );
        } catch (Exception $e) {
            DB::rollBack();

            return ResponseFormatter::error(
                $e->getMessage(),
                "Transaksi Gagal",
            );
        }
    }

    public function confirmation(Request $request)
    {
        DB::beginTransaction();
        try {
            $request->validate([
                'id' => 'required',
                'confirmation' => 'required',
            ]);
            $transaction =  SalesTransaction::with('users')->find($request->id);

            if ($request->confirmation) {
                if ($transaction->is_auto_payment) {
                    Config::$serverKey = config('services.midtrans.serverKey');
                    Config::$clientKey = config('services.midtrans.clientKey');
                    Config::$isProduction = config('services.midtrans.isProduction');
                    Config::$isSanitized = config('services.midtrans.isSanitized');
                    Config::$is3ds = config('services.midtrans.is3ds');

                    $midtrans = [
                        'transaction_details' => [
                            'order_id'    =>  $transaction->no_pemesanan,
                            'gross_amount'  => (int) $transaction->total_pesanan
                        ],
                        'customer_details' => [
                            'first_name' => $transaction->users->name,
                            'email' => $transaction->users->email,
                        ],
                        'vtweb' => [],
                        "expiry" => [
                            "start_time" => Carbon::now()->format('Y-m-d H:i:s') . "+0700",
                            "unit" => "minutes",
                            "duration" => 15,
                        ]
                    ];
                    $paymentUrl = Snap::createTransaction($midtrans)->redirect_url;
                    $transaction->link_pembayaran = $paymentUrl;
                    $transaction->save();
                    TransactionStatus::updateOrCreate([
                        'id_transaksi_penjualan' => $transaction->id,
                    ], [
                        'status' => 'Menunggu Pembayaran',
                        'tanggal_pesanan_disetujui' => Carbon::now()->format('Y-m-d H:i:s'),
                    ]);
                } else {
                    TransactionStatus::updateOrCreate([
                        'id_transaksi_penjualan' => $transaction->id,
                    ], [
                        'status' => 'Menunggu Pembayaran',
                        'tanggal_pesanan_disetujui' => Carbon::now()->format('Y-m-d H:i:s'),
                    ]);
                }
            } else {
                TransactionStatus::updateOrCreate([
                    'id_transaksi_penjualan' => $transaction->id,
                ], [
                    'tanggal_pesanan_dibatalkan' => Carbon::now()->format('Y-m-d H:i:s'),
                    'reason_pembatalan_penjual' => $request->reason_pembatalan_penjual,
                    'reason_pembatalan_pembeli' => $request->reason_pembatalan_pembeli,

                ]);
            }

            DB::commit();

            return ResponseFormatter::success(
                $transaction->load(['users', 'transaction_status']),
                "Confirmation Success",
            );
        } catch (Exception $e) {
            DB::rollBack();
            return ResponseFormatter::error(
                [
                    'message' => $e->getMessage()
                ],
                "Confirmation Failed",
            );
        }
    }

    public function payment(Request $request)
    {
        try {
            DB::beginTransaction();
            $request->validate([
                'id' => 'required',
                'confirmation' => 'required|boolean|in:1,0',
            ]);
        } catch (Exception $e) {
            DB::rollBack();
            return ResponseFormatter::error(
                [
                    'message' => $e->getMessage()
                ],
                "Confirmation Failed",
            );
        }
    }

    public function changeStatus(Request $request)
    {
        $transaction =  SalesTransaction::with('users')->find($request->id);

        try {
            DB::beginTransaction();

            $request->validate([
                'id' => 'required',
                'status' => 'required|boolean|in:Menunggu Konfirmasi, Menunggu Pembayaran,Sedang Disiapkan, Telah Dikirimkan, Telah Diterima, Dibatalkan',
            ]);

            switch ($request->status) {
                case 'Menunggu Konfirmasi':
                    TransactionStatus::updateOrCreate([
                        'id_transaksi_penjualan' => $transaction->id,
                    ], [
                        'status' => 'Menunggu Konfirmasi',
                        // 'tanggal_pesanan_dibatalkan' => Carbon::now()->format('Y-m-d H:i:s'),
                    ]);
                    break;
                case 'Menunggu Pembayaran':
                    TransactionStatus::updateOrCreate([
                        'id_transaksi_penjualan' => $transaction->id,
                    ], [
                        'status' => 'Menunggu Pembayaran',
                        // 'tanggal_pesanan_dibatalkan' => Carbon::now()->format('Y-m-d H:i:s'),
                    ]);
                    break;
                case 'Sedang Disiapkan':
                    TransactionStatus::updateOrCreate([
                        'id_transaksi_penjualan' => $transaction->id,
                    ], [
                        'status' => 'Sedang Disiapkan',
                        'tanggal_pesanan_disiapkan' => Carbon::now()->format('Y-m-d H:i:s'),
                    ]);
                    break;
                case 'Telah Dikirimkan':
                    TransactionStatus::updateOrCreate([
                        'id_transaksi_penjualan' => $transaction->id,
                    ], [
                        'status' => 'Telah Dikirimkan',
                        'tanggal_pesanan_dikirimkan' => Carbon::now()->format('Y-m-d H:i:s'),
                    ]);
                    break;
                case 'Telah Diterima':
                    TransactionStatus::updateOrCreate([
                        'id_transaksi_penjualan' => $transaction->id,
                    ], [
                        'status' => 'Telah Diterima',
                        'tanggal_pesanan_diterima' => Carbon::now()->format('Y-m-d H:i:s'),
                    ]);
                    break;
                case 'Dibatalkan':
                    TransactionStatus::updateOrCreate([
                        'id_transaksi_penjualan' => $transaction->id,
                    ], [
                        'tanggal_pesanan_dibatalkan' => Carbon::now()->format('Y-m-d H:i:s'),
                        'reason_pembatalan_penjual' => $request->reason_pembatalan_penjual,
                        'reason_pembatalan_pembeli' => $request->reason_pembatalan_pembeli,

                    ]);
                    break;

                default:
                    //   dd("tidak terdeteksi");
                    break;
            }

            DB::commit();
            return ResponseFormatter::success(
                $transaction->load(['users', 'transaction_status']),
                "Change Status Success",
            );
        } catch (Exception $e) {
            DB::rollBack();
            return ResponseFormatter::error(
                [
                    'message' => $e->getMessage()
                ],
                "Change Status Failed",
            );
        }
    }






    public function destroy($id)
    {
    }
}
