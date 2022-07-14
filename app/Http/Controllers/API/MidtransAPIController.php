<?php

namespace App\Http\Controllers\API;

use Carbon\Carbon;
use Midtrans\Config;
use Midtrans\Notification;
use Illuminate\Http\Request;
use App\Models\SalesTransaction;
use App\Models\TransactionStatus;
use App\Http\Controllers\Controller;
use App\Models\Balances;

class MidtransAPIController extends Controller
{
    // 'Menunggu Konfirmasi', 'Menunggu Pembayaran','Sedang Disiapkan', 'Telah Dikirimkan', 'Talah Diterima', 'Dibatalkan'

    public function callback(Request $request)
    {
        Config::$serverKey = config('services.midtrans.serverKey');
        Config::$clientKey = config('services.midtrans.clientKey');
        Config::$isProduction = config('services.midtrans.isProduction');
        Config::$isSanitized = config('services.midtrans.isSanitized');
        Config::$is3ds = config('services.midtrans.is3ds');

        $notification = new  Notification();

        $status = $notification->transaction_status;
        $type =  $notification->payment_type;
        $froud  =  $notification->fraud_status;
        $order_id =  $notification->order_id;

        $transaction = SalesTransaction::where('no_pemesanan', $order_id)->first();
        $transactionStatus = TransactionStatus::where('id_transaksi_penjualan', $transaction->id)->first();
        if ($status == 'capture') {
            if ($type == 'credit_card') {
                if ($froud == 'challenge') {
                    $transactionStatus->status = 'Menunggu Pembayaran';
                    // $transactionStatus->tanggal_pesanan_dibuat = Carbon::now()->format('Y-m-d H:i:s'),
                } else {
                    $transactionStatus->status = 'Sedang Disiapkan';
                    $transactionStatus->status_auto_payment = 'Telah Dibayar';
                    $transactionStatus->tanggal_pembayaran = Carbon::now()->format('Y-m-d H:i:s');
                    Balances::create([
                        'id_user' =>  $transaction->id_user,
                        'id_kategori_transaksi' => 1,
                        'id_transaksi_penjualan' => $transaction->id,
                        'pemasukan' => $transaction->subtotal_produk + $transaction->subtotal_ongkir,
                        'deskripsi' => "Pembayaran untuk pesanan $order_id telah berhasil"
                    ]);
                }
            }
        } else if ($status == 'settlement') {
            $transactionStatus->status = 'Sedang Disiapkan';
            $transactionStatus->status_auto_payment = 'Telah Dibayar';
            $transactionStatus->tanggal_pembayaran = Carbon::now()->format('Y-m-d H:i:s');
            Balances::create([
                'id_user' =>  $transaction->id_user,
                'id_kategori_transaksi' => 1,
                'id_transaksi_penjualan' => $transaction->id,
                'pemasukan' => $transaction->subtotal_produk + $transaction->subtotal_ongkir,
                'deskripsi' => "Pembayaran untuk pesanan $order_id telah berhasil"
            ]);
        } else if ($status == 'pending') {
            $transactionStatus->status = 'Menunggu Pembayaran';
            // $transactionStatus->tanggal_pembayaran = Carbon::now()->format('Y-m-d H:i:s');
        } else if ($status == 'deny') {
            $transactionStatus->status = 'Dibatalkan';
            $transactionStatus->tanggal_pesanan_dibatalkan = Carbon::now()->format('Y-m-d H:i:s');
            $transactionStatus->reason_pembatalan_penjual = "Pembayaran ditolak oleh sistem";
            $transactionStatus->status_auto_payment = 'Pembayaran gagal';
        } else if ($status == 'expire') {
            $transactionStatus->status = 'Dibatalkan';
            $transactionStatus->tanggal_pesanan_dibatalkan = Carbon::now()->format('Y-m-d H:i:s');
            $transactionStatus->reason_pembatalan_penjual = "Waktu pembayaran telah berakhir, anda dapat mengulangi pemesanan untuk melakukan pembayaran.";
            $transactionStatus->status_auto_payment = 'Pembayaran gagal';
        } else if ($status == 'cancel') {
            $transactionStatus->status = 'Dibatalkan';
            $transactionStatus->tanggal_pesanan_dibatalkan = Carbon::now()->format('Y-m-d H:i:s');
            $transactionStatus->reason_pembatalan_penjual = "Pembayaran dibatalkan oleh sistem";
            $transactionStatus->status_auto_payment = 'Pembayaran gagal';
        }

        $transactionStatus->save();
    }

    public function success()
    {
        return view('midtrans.success');
    }
    public function unfinish()
    {
        return view('midtrans.unfinish');
    }
    public function error()
    {
        return view('midtrans.error');
    }
}
