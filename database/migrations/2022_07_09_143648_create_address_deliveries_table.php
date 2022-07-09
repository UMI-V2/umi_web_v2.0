<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAddressDeliveriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('address_deliveries', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_transaksi_penjualan');
            $table->bigInteger('province_id')->unsigned();
            $table->bigInteger('city_id')->unsigned();
            $table->bigInteger('subdistrict_id')->unsigned();

            $table->string('nama');
            $table->string('no_hp');
            $table->string('alamat_lengkap');
            $table->string('patokan');
            $table->boolean('is_alamat_utama')->default(false);
            $table->boolean('is_rumah')->default(false);
            $table->boolean('is_kantor')->default(false);
            $table->boolean('is_usaha')->default(false);
            $table->string('latitude')->nullable();
            $table->string('longitude')->nullable();
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
        Schema::dropIfExists('address_deliveries');
    }
}
