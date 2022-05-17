<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMasterCitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('master_cities', function (Blueprint $table) {
            $table->id('city_id');
            $table->bigInteger('province_id')->unsigned();
            $table->string('city_name');
            $table->string('postal_code');
        
            $table->timestamps();

            $table->foreign('province_id')->references('province_id')->on('master_provinces');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Schema::dropIfExists('master_cities');
    }
}
