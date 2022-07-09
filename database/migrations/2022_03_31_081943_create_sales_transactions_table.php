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
            $table->id();
            $table->bigInteger('id_user')->unsigned();
            $table->bigInteger('id_usaha')->unsigned();
            $table->bigInteger('id_metode_pembayaran')->unsigned()->nullable();
            $table->bigInteger('id_sales_delivery_service')->unsigned()->nullable();
            $table->boolean('is_ambil_di_toko')->nullable();
            $table->string('no_pemesanan');
            $table->integer('subtotal_produk');
            $table->integer('subtotal_ongkir')->nullable();
            $table->integer('diskon');
            $table->integer('biaya_penanganan');
            $table->string('link_pembayaran')->nullable();
            $table->dateTime('batas_waktu_pembayaran')->nullable();
            $table->integer('total_pesanan');
            $table->boolean('is_delivery')->default(false);
            $table->boolean('is_manual_payment')->default(false);
            $table->boolean('is_auto_payment')->default(false);
            $table->boolean('is_rating')->default(false);
            $table->longText('message')->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('id_user')->references('id')->on('users');
            $table->foreign('id_usaha')->references('id')->on('businesses');
            $table->foreign('id_metode_pembayaran')->references('id')->on('business_payment_methods');
            $table->foreign('id_sales_delivery_service')->references('id')->on('sales_delivery_services');
        });
        Schema::enableForeignKeyConstraints();

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::disableForeignKeyConstraints();
        Schema::drop('sales_transactions');
    }
}
