<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGeneralFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('general_files', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('news_id')->nullable();
            $table->unsignedBigInteger('announcement_id')->nullable();
            $table->unsignedBigInteger('events_id')->nullable();
            $table->unsignedBigInteger('feed_id')->nullable();
            $table->string('file');
            $table->string('is_video')->default(false);
            $table->string('is_photo')->default(false);

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
        Schema::dropIfExists('general_files');
    }
}
