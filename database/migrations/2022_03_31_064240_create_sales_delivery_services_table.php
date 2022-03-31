<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalesDeliveryServicesTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales_delivery_services', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_jasa_pengiriman')->unsigned();
            $table->string('jenis_layanan');
            $table->string('deskripsi_layanan');
            $table->integer('ongkir');
            $table->timestamps();
            $table->foreign('id_jasa_pengiriman')->references('id')->on('master_delivery_services');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('sales_delivery_services');
    }
}
