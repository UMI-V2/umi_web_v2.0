<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionStatusesTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaction_statuses', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_transaksi_penjualan')->unsigned();
            $table->enum('status', array('Menunggu Konfirmasi', 'Menunggu Pembayaran','Sedang Disiapkan','Telah Siap', 'Telah Dikirimkan', 'Telah Diterima', 'Dibatalkan'))->nullable();
            $table->string('status_auto_payment', 20)->nullable();
            $table->dateTime('tanggal_pesanan_dibuat')->nullable();
            $table->dateTime('tanggal_pesanan_disetujui')->nullable();
            $table->dateTime('tanggal_pembayaran')->nullable();
            $table->dateTime('tanggal_pesanan_disiapkan')->nullable();
            $table->dateTime('tanggal_pesanan_telah_siap')->nullable();
            $table->dateTime('tanggal_pesanan_dikirimkan')->nullable();
            $table->dateTime('tanggal_pesanan_diterima')->nullable();
            $table->dateTime('tanggal_pesanan_dibatalkan')->nullable();
            $table->string('reason_pembatalan_penjual')->nullable();
            $table->string('reason_pembatalan_pembeli')->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('id_transaksi_penjualan')->references('id')->on('sales_transactions');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('transaction_statuses');
    }
}
