<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDiscountsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();
        Schema::create('discounts', function (Blueprint $table) {
            $table->id();
            // $table->bigInteger('id_product_discount')->unsigned();
            $table->bigInteger('id_usaha')->unsigned()->nullable();

            $table->string('nama_promo');
            $table->dateTime('waktu_mulai');
            $table->dateTime('waktu_berakhir');
            $table->integer('potongan')->nullable();
            $table->integer('type');
            $table->timestamps();
            $table->softDeletes();
            // $table->foreign('id_product_discount')->references('id')->on('products');
            $table->foreign('id_usaha')->references('id')->on('businesses');

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
        Schema::drop('discounts');
    }
}
