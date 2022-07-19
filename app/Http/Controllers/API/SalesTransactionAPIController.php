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
use App\Models\Address;
use App\Models\AddressDelivery;
use App\Models\Balances;
use App\Models\Notification;

/**
 * Class SalesTransactionController
 * @package App\Http\Controllers\API
 */

class SalesTransactionAPIController extends AppBaseController
{
    // 'Menunggu Konfirmasi', 'Menunggu Pembayaran','Sedang Disiapkan','Telah Siap', 'Telah Dikirimkan', 'Telah Diterima', 'Dibatalkan'

    public function all(Request $request)
    {
        try {
            // $transaction = SalesTransaction::where('is_auto_payment', 1)->whereHas('transaction_status', function ($q) {
            //     $q->whereNotNull('tanggal_pesanan_diterima');
            // })->sum('total_pesanan');
            // return ResponseFormatter::success(
            //     $transaction,
            //     "Get All Transaksi SUM",
            // );

            $id = $request->input('id');
            $id_user = $request->input('id_user');
            $id_usaha = $request->input('id_usaha');

            if ($id) {
                $transaction = SalesTransaction::with(['users', 'businesses.users', 'transaction_status', 'products_detail.rating', 'address_delivery'])->find($id);
                return ResponseFormatter::success(
                    $transaction,
                    "Get Transaksi Berhasil",
                );
            }
            $transaction = SalesTransaction::with(['users', 'businesses.users', 'transaction_status', 'products_detail.rating', 'address_delivery']);

            if ($id_user) {
                $transaction->where('id_user', $id_user);
            }
            if ($id_usaha) {
                $transaction->where('id_usaha', $id_usaha);
            }

            return ResponseFormatter::success(
                $transaction->orderBy('updated_at', 'desc')->get(),
                "Get All Transaksi Saya Berhasil",
            );
        } catch (Exception $e) {
            return ResponseFormatter::error(
                $e->getMessage(),
                "Get All Transaksi Gagal",
            );
        }
    }
    public function getMyTransaction(Request $request)
    {
        try {
            $transaction = SalesTransaction::with(['users', 'businesses.users', 'transaction_status', 'products_detail.rating', 'address_delivery'])->where('id_user', $request->user()->id)->orderBy('updated_at', 'desc')->get();
            return ResponseFormatter::success(
                $transaction,
                "Get Transaksi Saya Berhasil",
            );
        } catch (Exception $e) {
            return ResponseFormatter::error(
                $e->getMessage(),
                "Get Transaksi Saya Gagal",
            );
        }
    }

    public function update(Request $request)
    {
    }

    public function checkout(Request $request)
    {

        DB::beginTransaction();
        Validator::make($request->all(), [
            'id_usaha' => 'required|exists:businesses,id',
            'id_address' => 'exists:addresses,id',
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



        $transaction = SalesTransaction::with(['users', 'businesses'])->find($transaction->id);
        // dd($transaction);
        $no_pesanan = Carbon::now()->getPreciseTimestamp(3) . "$transaction->id";

        try {
            TransactionProductAPIController::addProduct($request,  $transaction->id);
            TransactionStatus::updateOrCreate([
                'id_transaksi_penjualan' => $transaction->id,
            ], [
                'status' => 'Menunggu Konfirmasi',
                'tanggal_pesanan_dibuat' => Carbon::now()->format('Y-m-d H:i:s'),

            ]);
            if ($request->id_address) {
                $address = Address::find($request->id_address);
                AddressDelivery::updateOrCreate([
                    'id_transaksi_penjualan' => $transaction->id,
                ], [
                    'province_id' => $address->province_id,
                    'city_id' => $address->city_id,
                    'subdistrict_id' => $address->subdistrict_id,
                    'nama' => $address->nama,
                    'no_hp' => $address->no_hp,
                    'alamat_lengkap' => $address->alamat_lengkap,
                    'patokan' => $address->patokan,
                    'is_alamat_utama' => $address->is_alamat_utama,
                    'is_rumah' => $address->is_rumah,
                    'is_kantor' => $address->is_kantor,
                    'is_usaha' => $address->is_usaha,
                    'latitude' => $address->latitude,
                    'longitude' => $address->longitude,
                ]);
            }
            $transaction->no_pemesanan = $no_pesanan;
            $transaction->save();

            DB::commit();
            NotificationAPIController::add(
                "Pesanan Baru",
                "Harap segera untuk memberikan konfirmasi",
                "specific",
                'order',
                "No. Pemesanan: $transaction->no_pemesanan",
                $transaction->id,
                $transaction->businesses->id_user,
            );

            return ResponseFormatter::success(
                $transaction->load(['businesses.users', 'users', 'transaction_status', 'products_detail.rating']),
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
            $transaction =  SalesTransaction::with(['users', 'businesses'])->find($request->id);

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
                            "duration" => 30,
                        ]
                    ];
                    $paymentUrl = Snap::createTransaction($midtrans)->redirect_url;
                    $transaction->link_pembayaran = $paymentUrl;
                    $transaction->batas_waktu_pembayaran = Carbon::now()->addMinute(30)->format('Y-m-d H:i:s');
                    if ($request->subtotal_ongkir) {
                        $transaction->subtotal_ongkir = $request->subtotal_ongkir;
                        $transaction->total_pesanan = $transaction->total_pesanan + $request->subtotal_ongkir;
                    }
                    $transaction->save();
                    TransactionStatus::updateOrCreate([
                        'id_transaksi_penjualan' => $transaction->id,
                    ], [
                        'status' => 'Menunggu Pembayaran',
                        'status_auto_payment' => 'Belum Dibayar',
                        'tanggal_pesanan_disetujui' => Carbon::now()->format('Y-m-d H:i:s'),
                    ]);
                    DB::commit();
                    NotificationAPIController::add(
                        "Pesanan Disetujui",
                        "Harap segera untuk memlakukan pembayaran",
                        "specific",
                        'order',
                        "No. Pemesanan: $transaction->no_pemesanan",
                        $transaction->id,
                        $transaction->id_user,
                    );
                } else {
                    if ($request->subtotal_ongkir) {
                        $transaction->subtotal_ongkir = $request->subtotal_ongkir;
                        $transaction->total_pesanan = $transaction->total_pesanan + $request->subtotal_ongkir;
                        $transaction->save();
                    }

                    TransactionStatus::updateOrCreate([
                        'id_transaksi_penjualan' => $transaction->id,
                    ], [
                        'status' => 'Sedang Disiapkan',
                        'tanggal_pesanan_disetujui' => Carbon::now()->format('Y-m-d H:i:s'),
                        'tanggal_pesanan_disiapkan' => Carbon::now()->format('Y-m-d H:i:s'),
                    ]);
                    DB::commit();
                    NotificationAPIController::add(
                        "Pesanan Disetujui",
                        "Pesanan sedang disiapkan, harap untuk menunggu",
                        "specific",
                        'order',
                        "No. Pemesanan: $transaction->no_pemesanan",
                        $transaction->id,
                        $transaction->id_user,
                    );
                }
            } else {
                TransactionStatus::updateOrCreate([
                    'id_transaksi_penjualan' => $transaction->id,
                ], [
                    'tanggal_pesanan_dibatalkan' => Carbon::now()->format('Y-m-d H:i:s'),
                    'status' => 'Dibatalkan',
                    'reason_pembatalan_penjual' => $request->reason_pembatalan_penjual,
                    'reason_pembatalan_pembeli' => $request->reason_pembatalan_pembeli,

                ]);
                DB::commit();
                if ($request->reason_pembatalan_penjual) {
                    NotificationAPIController::add(
                        "Pesanan Ditolak",
                        "Pesanan ditolak oleh penjual.",
                        "specific",
                        'order',
                        "No. Pemesanan: $transaction->no_pemesanan \nAlasan:\n$request->reason_pembatalan_penjual",
                        $transaction->id,
                        $transaction->id_user,
                    );
                }
                if ($request->reason_pembatalan_pembeli) {
                    NotificationAPIController::add(
                        "Pesanan Dibatalkan",
                        "Pesanan dibatalkan oleh pembeli",
                        "specific",
                        'order',
                        "No. Pemesanan: $transaction->no_pemesanan \nAlasan:\n$request->reason_pembatalan_pembeli",
                        $transaction->id,
                        $transaction->businesses->id_user,
                    );
                }
            }



            return ResponseFormatter::success(
                $transaction->load(['businesses.users', 'users', 'transaction_status',  'products_detail.rating', 'address_delivery']),
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


    public function changeStatus(Request $request)
    {
        $transaction =  SalesTransaction::with(['users', 'businesses'])->find($request->id);

        try {
            DB::beginTransaction();
            Validator::make($request->all(), [
                'id' => 'required',
                'status' => 'required|in:Menunggu Konfirmasi, Menunggu Pembayaran, Sedang Disiapkan,Telah Siap, Telah Dikirimkan, Telah Diterima, Dibatalkan',
            ]);

            switch ($request->status) {
                case 'Menunggu Konfirmasi':
                    TransactionStatus::updateOrCreate([
                        'id_transaksi_penjualan' => $transaction->id,
                    ], [
                        'status' => 'Menunggu Konfirmasi',
                    ]);
                    
                    break;
                case 'Menunggu Pembayaran':
                    TransactionStatus::updateOrCreate([
                        'id_transaksi_penjualan' => $transaction->id,
                    ], [
                        'status' => 'Menunggu Pembayaran',
                    ]);
                    NotificationAPIController::add(
                        "Pesanan Disetujui",
                        "Silahkan untuk segera melakukan pembayaran",
                        "specific",
                        'order',
                        "No. Pemesanan: $transaction->no_pemesanan",
                        $transaction->id,
                        $transaction->id_user,
                    );
                    break;
                case 'Sedang Disiapkan':
                    TransactionStatus::updateOrCreate([
                        'id_transaksi_penjualan' => $transaction->id,
                    ], [
                        'status' => 'Sedang Disiapkan',
                        'tanggal_pesanan_disiapkan' => Carbon::now()->format('Y-m-d H:i:s'),
                    ]);
                    NotificationAPIController::add(
                        "Pesanan Sedang Disiapkan",
                        "Pesanan anda sedang disiapkan oleh penjual.\nHarap untuk menunggu",
                        "specific",
                        'order',
                        "No. Pemesanan: $transaction->no_pemesanan",
                        $transaction->id,
                        $transaction->id_user,
                    );
                    break;
                case 'Telah Siap':
                    TransactionStatus::updateOrCreate([
                        'id_transaksi_penjualan' => $transaction->id,
                    ], [
                        'status' => 'Telah Siap',
                        'tanggal_pesanan_telah_siap' => Carbon::now()->format('Y-m-d H:i:s'),
                    ]);
                    NotificationAPIController::add(
                        "Pesanan Telah Siap",
                        "Anda dapat segera mengambilnya di lokasi lapak.",
                        "specific",
                        'order',
                        "No. Pemesanan: $transaction->no_pemesanan",
                        $transaction->id,
                        $transaction->id_user,
                    );
                    break;
                case 'Telah Dikirimkan':
                    TransactionStatus::updateOrCreate([
                        'id_transaksi_penjualan' => $transaction->id,
                    ], [
                        'status' => 'Telah Dikirimkan',
                        'tanggal_pesanan_dikirimkan' => Carbon::now()->format('Y-m-d H:i:s'),
                    ]);
                    NotificationAPIController::add(
                        "Pesanan Telah Dikirim",
                        "Pesanan dalam pengiriman ke lokasi anda. Harap untuk menunggu",
                        "specific",
                        'order',
                        "No. Pemesanan: $transaction->no_pemesanan",
                        $transaction->id,
                        $transaction->id_user,
                    );
                    break;
                case 'Telah Diterima':
                    TransactionStatus::updateOrCreate([
                        'id_transaksi_penjualan' => $transaction->id,
                    ], [
                        'status' => 'Telah Diterima',
                        'tanggal_pesanan_diterima' => Carbon::now()->format('Y-m-d H:i:s'),
                    ]);
                    
                    NotificationAPIController::add(
                        "Pesanan Telah Diterima",
                        "Terimakasih telah melakukan pembelanjaan melalui aplikasi UMI. Semoga hari-harimu selalu menyenangkan",
                        "specific",
                        'order',
                        "No. Pemesanan: $transaction->no_pemesanan",
                        $transaction->id,
                        $transaction->id_user,
                    );
                    NotificationAPIController::add(
                        "Pesanan Telah Diterima",
                        "Pesanan telah di terima oleh pembeli. Terimakasih atas kepercayaan anda. Semoga hari-harimu selalu menyenangkan",
                        "specific",
                        'order',
                        "No. Pemesanan: $transaction->no_pemesanan",
                        $transaction->id,
                        $transaction->businesses->id_user,
                    );
                    if($transaction->link_pembayaran!=null&&$transaction->is_auto_payment){
                        // dd("Masuk sini");
                        Balances::updateOrCreate([
                            'id_user'=>  $transaction->businesses->id_user,
                            'id_kategori_transaksi'=> 1,
                            'id_transaksi_penjualan'=>  $transaction->id,
                            'id_usaha'=> $transaction->businesses->id,
                            'pengeluaran'=>0,
                            'pemasukan'=> $transaction->total_pesanan -$transaction->biaya_penanganan,
                            'deskripsi'=> "Pembayaran pemesanan dengan no.pemesanan: $transaction->no_pemesanan"
                        ]);
                    }
                    break;
                case 'Dibatalkan':
                    //  'Telah Siap', 'Telah Dikirimkan', 'Telah Diterima',
                    $statusTransaction = TransactionStatus::where('id_transaksi_penjualan', $transaction->id)->first();
                    if ($transaction->is_delivery) {
                        if ($statusTransaction->status == 'Sedang Disiapkan' || $statusTransaction->status == 'Telah Dikirimkan' || $statusTransaction->status == 'Telah Diterima') {
                            return ResponseFormatter::error(
                                [
                                    'message' => "Pesanan tidak dapat dibatalkan, karena status pesanan sekarang $statusTransaction->status"
                                ],
                                "Change Status Failed",
                            );
                        }
                    } else {
                        if ($statusTransaction->status == 'Telah Diterima') {
                            return ResponseFormatter::error(
                                [
                                    'message' => "Pesanan tidak dapat dibatalkan, karena status pesanan sekarang $statusTransaction->status"
                                ],
                                "Change Status Failed",
                            );
                        }
                    }

                    TransactionStatus::updateOrCreate([
                        'id_transaksi_penjualan' => $transaction->id,
                    ], [
                        'tanggal_pesanan_dibatalkan' => Carbon::now()->format('Y-m-d H:i:s'),
                        'status' => 'Dibatalkan',
                        'reason_pembatalan_penjual' => $request->reason_pembatalan_penjual,
                        'reason_pembatalan_pembeli' => $request->reason_pembatalan_pembeli,
                    ]);
                    if ($request->reason_pembatalan_penjual) {
                        NotificationAPIController::add(
                            "Pesanan Ditolak",
                            "Pesanan ditolak oleh penjual.",
                            "specific",
                            'order',
                            "No. Pemesanan: $transaction->no_pemesanan \nAlasan:\n$request->reason_pembatalan_penjual",
                            $transaction->id,
                            $transaction->id_user,
                        );
                    }
                    if ($request->reason_pembatalan_pembeli) {
                        NotificationAPIController::add(
                            "Pesanan Dibatalkan",
                            "Pesanan dibatalkan oleh pembeli",
                            "specific",
                            'order',
                            "No. Pemesanan: $transaction->no_pemesanan \nAlasan:\n$request->reason_pembatalan_pembeli",
                            $transaction->id,
                            $transaction->businesses->id_user,
                        );
                    }
                    break;

                default:
                    //   dd("tidak terdeteksi");
                    break;
            }

            DB::commit();
            return ResponseFormatter::success(
                $transaction->load(['users', 'businesses.users', 'transaction_status', 'products_detail.rating', 'address_delivery']),
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
