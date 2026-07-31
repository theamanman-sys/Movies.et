<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateSeasonsToV2 extends Migration
{
    public function up()
    {
        Schema::table('seasons', function (Blueprint $table) {
            $table->dropColumn('title');
        });
        Schema::table('seasons', function (Blueprint $table) {
            $table->dropColumn('fully_scraped');
        });
        Schema::table('seasons', function (Blueprint $table) {
            $table->dropColumn('temp_id');
        });
        Schema::table('seasons', function (Blueprint $table) {
            $table->dropColumn('title_imdb_id');
        });
        Schema::table('seasons', function (Blueprint $table) {
            $table->dropColumn('overview');
        });

        Schema::table('seasons', function (Blueprint $table) {
            $table->integer('episode_count')->unsigned();
            $table->tinyInteger('fully_synced')->unsigned()->default(0);
        });
    }

    public function down()
    {
        Schema::table('seasons', function (Blueprint $table) {
            //
        });
    }
}
