<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubDistrictsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sub_districts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_provinsi')->unsigned();
            $table->integer('id_kota')->unsigned();
            $table->string('nama_kecamatan');
            $table->timestamps();
            $table->foreign('id_provinsi')->references('id')->on('master_provinces');
            $table->foreign('id_kota')->references('id')->on('cities');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('sub_districts');
    }
}
