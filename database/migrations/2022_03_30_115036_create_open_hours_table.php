<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOpenHoursTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('open_hours', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_usaha')->unsigned();
            $table->string('senin')->nullable();
            $table->string('selasa')->nullable();
            $table->string('rabu')->nullable();
            $table->string('kamis')->nullable();
            $table->string('jumat')->nullable();
            $table->string('sabtu')->nullable();
            $table->string('minggu')->nullable();
            $table->timestamps();
            $table->foreign('id_usaha')->references('id')->on('businesses');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('open_hours');
    }
}
