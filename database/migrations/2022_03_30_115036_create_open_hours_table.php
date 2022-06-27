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
            $table->string('senin_buka')->nullable();
            $table->string('senin_tutup')->nullable();
            $table->string('selasa_buka')->nullable();
            $table->string('selasa_tutup')->nullable();
            $table->string('rabu_buka')->nullable();
            $table->string('rabu_tutup')->nullable();
            $table->string('kamis_buka')->nullable();
            $table->string('kamis_tutup')->nullable();
            $table->string('jumat_buka')->nullable();
            $table->string('jumat_tutup')->nullable();
            $table->string('sabtu_buka')->nullable();
            $table->string('sabtu_tutup')->nullable();
            $table->string('minggu_buka')->nullable();
            $table->string('minggu_tutup')->nullable();
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
