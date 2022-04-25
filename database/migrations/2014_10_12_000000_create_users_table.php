<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('username')->nullable();
            $table->string('jenis_kelamin');
            $table->string('tanggal_lahir');
            $table->string('no_hp')->unique();
            $table->string('foto')->nullable();
            $table->string('email')->unique()->nullable();
            $table->string('password');
            $table->bigInteger('id_privilege')->unsigned()->default(4);
            $table->bigInteger('id_status_pengguna')->unsigned()->default(1);
            $table->string('profile_photo_path', 2048)->nullable();
            $table->foreignId('current_team_id')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('id_privilege')->references('id')->on('master_privileges');
            $table->foreign('id_status_pengguna')->references('id')->on('master_status_users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
};
