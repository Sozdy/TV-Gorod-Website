<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAuthorsToNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('news', function (Blueprint $table) {
            $table->string("description", 14000)->change();
            $table->string("short_description", 255)->change();
            $table->string("slug", 255)->change();
            $table->string("title", 255)->change();
            $table->string("video_link", 255)->change();

            $table->string("text_author", 255)->nullable();
            $table->string("photo_author", 255)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('news', function (Blueprint $table) {
            $table->dropColumn("text_author");
            $table->dropColumn("photo_author");

            $table->string("description", 15000)->change();
        });
    }
}
