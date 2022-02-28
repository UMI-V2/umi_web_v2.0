<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMasterDeliveryServicesTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('master_delivery_services', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama_jasa_pengiriman');
            $table->string('ongkir');
            $table->string('deskripsi');
            $table->string('kode_rajaongkir');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('master_delivery_services');
    }
}
