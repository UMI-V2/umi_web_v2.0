<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBusinessesTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('businesses', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_user')->unsigned();
            $table->integer('id_master_status_usaha')->unsigned();
            $table->string('nama_usaha');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('id_user')->references('id')->on('users');
            $table->foreign('id_master_status_usaha')->references('id')->on('master_status_businesses');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('businesses');
    }
}
