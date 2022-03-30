<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_usaha')->unsigned();
            $table->integer('id_satuan')->unsigned();
            $table->string('nama');
            $table->string('deskripsi');
            $table->string('harga');
            $table->integer('stok');
            $table->boolean('kondisi');
            $table->boolean('preorder');
            $table->timestamps();
            $table->foreign('id_usaha')->references('id')->on('businesses');
            $table->foreign('id_satuan')->references('id')->on('master_units');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('products');
    }
}
