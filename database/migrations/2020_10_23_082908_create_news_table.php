<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string("title");
            $table->string("slug");
            $table->string("short_description")->nullable();
            $table->string("description", 15000);
            $table->string("video_link")->nullable();
            $table->boolean("is_hot")->nullable();
            $table->boolean("is_first")->nullable();
            $table->boolean("is_main")->nullable();
            $table->integer("views")->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('news');
    }
}
