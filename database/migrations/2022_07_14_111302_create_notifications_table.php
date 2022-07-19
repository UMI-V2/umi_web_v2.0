<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notifications', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_item')->nullable();
            $table->unsignedBigInteger('id_user_destination')->nullable();
            $table->string('type', 15)->nullable();
            $table->string('category', 15)->nullable();
            $table->string('title');
            $table->string('sort_message');
            $table->string('full_message')->nullable();
            $table->string('image')->nullable();
            $table->boolean('is_read')->default(0);
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
        Schema::dropIfExists('notifications');
    }
}
