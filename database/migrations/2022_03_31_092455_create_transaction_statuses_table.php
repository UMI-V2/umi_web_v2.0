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
            $table->date('tanggal_pesanan_dibuat');
            $table->date('tanggal_pembayaran');
            $table->date('tanggal_pesanan_dikirimkan');
            $table->date('tanggal_pesanan_diterima');
            $table->timestamps();
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
