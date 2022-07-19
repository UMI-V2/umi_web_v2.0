<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWithdrawBalancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('withdraw_balances', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_user');
            $table->unsignedBigInteger('id_usaha');
            $table->unsignedBigInteger('id_bank');
            $table->integer('nominal');
            $table->string('no_rek');
            $table->string('rek_name');
            $table->string('bank_name');
            $table->integer('cost_admin');
            $table->enum('status', ['pending', 'onprogress', 'success', 'failed'])->default('pending');
            $table->string('note')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('withdraw_balances');
    }
}
