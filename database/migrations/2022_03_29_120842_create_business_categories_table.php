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
            $table->id();
            $table->bigInteger('id_usaha')->unsigned();
            $table->bigInteger('id_master_kategori_usaha')->unsigned();
            $table->timestamps();
            $table->foreign('id_usaha')->references('id')->on('businesses');
            $table->foreign('id_master_kategori_usaha')->references('id')->on('master_business_categories');
            $table->softDeletes();
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
