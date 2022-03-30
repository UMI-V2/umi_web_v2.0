<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShippingUsedsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shipping_useds', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_shipping_cost_variable')->unsigned();
            $table->integer('id_business_delivery_services')->unsigned();
            $table->timestamps();
            $table->foreign('id_shipping_cost_variable')->references('id')->on('shipping_cost_variables');
            $table->foreign('id_business_delivery_services')->references('id')->on('business_delivery_services');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('shipping_useds');
    }
}
