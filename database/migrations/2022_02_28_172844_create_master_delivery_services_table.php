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
            $table->id();
            $table->string('nama_jasa_pengiriman');
            $table->boolean('is_set_seller');
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
