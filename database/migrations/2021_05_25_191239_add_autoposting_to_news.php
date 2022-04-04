<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAutopostingToNews extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('news', function (Blueprint $table) {
            $table->boolean('export_news')->default(false);
            $table->boolean('export_social_webs')->default(false);
            $table->boolean('export_telegram')->default(false);
            $table->string('export_description')->nullable();
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
            $table->dropColumn("export_news");
            $table->dropColumn("export_social_webs");
            $table->dropColumn("export_telegram");
            $table->dropColumn("export_description");
        });
    }
}
