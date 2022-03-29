<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBusinessCategoriesTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('business_categories', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_usaha')->unsigned();
            $table->integer('id_master_kategori_usaha')->unsigned();
            $table->timestamps();
            $table->foreign('id_usaha')->references('id')->on('businesses');
            $table->foreign('id_master_kategori_usaha')->references('id')->on('master_status_businesses');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('business_categories');
    }
}
