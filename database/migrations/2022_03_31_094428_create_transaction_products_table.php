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
            $table->string('nama_produk');
            $table->string('jumlah_satuan');
            $table->string('nama_satuan');
            $table->integer('kuantitas');

            $table->string('photo_url_produk');
            $table->longText('deskripsi_produk');
            $table->boolean('kondisi')->nullable();
            $table->boolean('preorder')->nullable();
            $table->boolean('is_rating')->default(false);
            $table->boolean('is_service')->nullable();

            $table->timestamps();
            $table->softDeletes();
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
