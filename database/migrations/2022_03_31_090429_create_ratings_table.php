<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRatingsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ratings', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_produk')->unsigned();
            $table->bigInteger('id_transaksi_penjualan')->unsigned();
            $table->integer('rating');
            $table->string('ulasan');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('id_produk')->references('id')->on('products');
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
        Schema::drop('ratings');
    }
}
