<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionProductsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaction_products', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_transaksi_penjualan')->unsigned();
            $table->bigInteger('id_produk')->unsigned();
            $table->integer('harga_produk');
            $table->integer('harga_diskon');
            $table->string('deskripsi_produk');
            $table->boolean('kondisi');
            $table->boolean('preorder');
            $table->integer('ongkir');
            $table->timestamps();
            $table->foreign('id_transaksi_penjualan')->references('id')->on('sales_transactions');
            $table->foreign('id_produk')->references('id')->on('products');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('transaction_products');
    }
}
