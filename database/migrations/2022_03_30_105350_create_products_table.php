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
            $table->id();
            $table->bigInteger('id_usaha')->unsigned();
            $table->bigInteger('id_satuan')->unsigned();
            // $table->bigInteger('id_kategori')->unsigned()->nullable();
            $table->string('nama');
            $table->string('deskripsi');
            $table->bigInteger('harga');
            $table->integer('stok');
            $table->boolean('kondisi');
            $table->boolean('preorder');
            $table->string('jumlah_satuan');
            $table->boolean('is_arshive')->default(false);
            $table->string('latitude')->nullable();
            $table->string('longitude')->nullable();
            $table->timestamps();
            $table->foreign('id_usaha')->references('id')->on('businesses');
            $table->foreign('id_satuan')->references('id')->on('master_units');
            // $table->foreign('id_kategori')->references('id')->on('master_product_categories');

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
