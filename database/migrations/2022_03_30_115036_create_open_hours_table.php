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
            $table->id();
            $table->bigInteger('id_usaha')->unsigned();
            $table->time('senin_buka')->nullable();
            $table->time('senin_tutup')->nullable();
            $table->time('selasa_buka')->nullable();
            $table->time('selasa_tutup')->nullable();
            $table->time('rabu_buka')->nullable();
            $table->time('rabu_tutup')->nullable();
            $table->time('kamis_buka')->nullable();
            $table->time('kamis_tutup')->nullable();
            $table->time('jumat_buka')->nullable();
            $table->time('jumat_tutup')->nullable();
            $table->time('sabtu_buka')->nullable();
            $table->time('sabtu_tutup')->nullable();
            $table->time('minggu_buka')->nullable();
            $table->time('minggu_tutup')->nullable();
            $table->timestamps();
            $table->softDeletes();
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
