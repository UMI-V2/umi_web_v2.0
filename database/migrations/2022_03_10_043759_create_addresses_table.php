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
            $table->integer('id_user');
            $table->integer('id_master_address_type');

            $table->string('nama');
            $table->string('no_hp');
            $table->integer('id_provinsi');
            $table->integer('id_kota');
            $table->integer('id_kecamatan');
            $table->string('alamat_lengkap');
            $table->string('patokan');
            $table->boolean('is_alamat_utama')->default(true);

            $table->string('latitude');
            $table->string('longitude');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('addresses');
    }
}
