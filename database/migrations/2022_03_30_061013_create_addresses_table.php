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
            $table->id();
            $table->bigInteger('id_users')->unsigned();
            $table->bigInteger('province_id')->unsigned();
            $table->bigInteger('city_id')->unsigned();
            $table->bigInteger('subdistrict_id')->unsigned();
            $table->string('nama');
            $table->string('no_hp');
            $table->string('alamat_lengkap');
            $table->string('patokan');
            $table->boolean('is_alamat_utama')->default(false);
            $table->boolean('is_rumah')->default(false);
            $table->boolean('is_kantor')->default(false);
            $table->boolean('is_usaha')->default(false);
            $table->string('latitude')->nullable();
            $table->string('longitude')->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('id_users')->references('id')->on('users');
            $table->foreign('province_id')->references('province_id')->on('master_provinces');
            $table->foreign('city_id')->references('city_id')->on('master_cities');
            $table->foreign('subdistrict_id')->references('subdistrict_id')->on('master_sub_districts');
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
