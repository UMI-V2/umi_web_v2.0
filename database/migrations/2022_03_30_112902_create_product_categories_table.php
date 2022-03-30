<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductCategoriesTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_categories', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_produk')->unsigned();
            $table->integer('id_master_kategori_produk')->unsigned();
            $table->timestamps();
            $table->foreign('id_produk')->references('id')->on('products');
            $table->foreign('id_master_kategori_produk')->references('id')->on('master_product_categories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('product_categories');
    }
}
