<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductDiscountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_discounts', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_product')->unsigned();
            $table->bigInteger('id_discount')->unsigned();
            $table->integer('harga_diskon');
            $table->integer('batas_pembelian');
            $table->timestamps();

            // $table->foreign('id_product')->references('id')->on('product_discounts');
            // $table->foreign('id_discount')->references('id')->on('discounts');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_discounts');
    }
}
