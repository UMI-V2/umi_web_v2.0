<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalesTransactionsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales_transactions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_user')->unsigned();
            $table->integer('id_usaha')->unsigned();
            $table->integer('id_metode_pembayaran')->unsigned();
            $table->integer('id_sales_delivery_service')->unsigned();
            $table->boolean('is_ambil_di_toko');
            $table->string('no_pemesanan');
            $table->integer('subtotal_produk');
            $table->integer('subtotal_ongkir');
            $table->integer('diskon');
            $table->integer('biaya_penanganan');
            $table->string('link_pembayaran');
            $table->integer('total_pesanan');
            $table->boolean('is_rating');
            $table->timestamps();
            $table->foreign('id_user')->references('id')->on('users');
            $table->foreign('id_usaha')->references('id')->on('businesses');
            $table->foreign('id_metode_pembayaran')->references('id')->on('business_payment_methods');
            $table->foreign('id_sales_delivery_service')->references('id')->on('sales_delivery_services');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('sales_transactions');
    }
}
