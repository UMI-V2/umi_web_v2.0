<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAddressesTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('addresses', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_users')->unsigned();
            $table->integer('id_provinsi')->unsigned();
            $table->integer('id_kota')->unsigned();
            $table->integer('id_kecamatan')->unsigned();
            $table->string('nama');
            $table->string('no_hp');
            $table->string('alamat_lengkap');
            $table->string('patokan');
            $table->boolean('is_alamat_utama');
            $table->boolean('is_rumah');
            $table->boolean('is_kantor');
            $table->boolean('is_usaha');
            $table->string('latitude')->nullable();
            $table->string('longitude')->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('id_users')->references('id')->on('users');
            $table->foreign('id_provinsi')->references('id')->on('master_provinces');
            $table->foreign('id_kota')->references('id')->on('cities');
            $table->foreign('id_kecamatan')->references('id')->on('sub_districts');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('addresses');
    }
}
