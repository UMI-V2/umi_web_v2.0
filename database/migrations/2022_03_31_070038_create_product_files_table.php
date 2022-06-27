<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductFilesTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_files', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_produk')->unsigned();
            $table->string('file');
            $table->boolean('video');
            $table->boolean('photo');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('id_produk')->references('id')->on('products');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('product_files');
    }
}
