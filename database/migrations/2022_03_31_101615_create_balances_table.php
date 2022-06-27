<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBalancesTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('balances', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_kategori_transaksi')->unsigned();
            $table->bigInteger('id_transaksi_penjualan')->unsigned();
            $table->integer('pengeluaran');
            $table->integer('pemasukan');
            $table->string('deskripsi');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('id_kategori_transaksi')->references('id')->on('master_transaction_categories');
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
        Schema::drop('balances');
    }
}
