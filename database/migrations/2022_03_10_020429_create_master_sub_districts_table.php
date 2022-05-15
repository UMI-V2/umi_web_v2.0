<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMasterSubDistrictsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('master_sub_districts', function (Blueprint $table) {
            $table->id('subdistrict_id');
            $table->bigInteger('city_id')->unsigned();
            $table->string('subdistrict_name');

            $table->timestamps();

            $table->foreign('city_id')->references('city_id')->on('master_cities');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Schema::dropIfExists('master_sub_districts');
    }
}
