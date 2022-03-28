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
            $table->bigInteger('id_usaha');
            $table->bigInteger('id_kategori_usaha');

            $table->timestamps();

            // $table->foreign('id_usaha')->references('id')->on('businesses');
            // $table->foreign('id_kategori_usaha')->references('id')->on('master_business_categories');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('business_categories');
    }
}
