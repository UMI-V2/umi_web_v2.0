<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBusinessPaymentMethodsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('business_payment_methods', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_usaha')->unsigned();
            $table->integer('id_metode_pembayaran')->unsigned();
            $table->timestamps();
            $table->foreign('id_usaha')->references('id')->on('businesses');
            $table->foreign('id_metode_pembayaran')->references('id')->on('master_payment_methods');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('business_payment_methods');
    }
}
