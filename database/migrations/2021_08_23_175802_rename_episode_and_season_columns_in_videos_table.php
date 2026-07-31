<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RenameEpisodeAndSeasonColumnsInVideosTable extends Migration
{
    public function up()
    {
        if (Schema::hasColumn('videos', 'episode_num')) {
            return;
        }

        if (Schema::hasColumn('videos', 'season')) {
            Schema::table('videos', function (Blueprint $table) {
                $table->renameColumn('season', 'season_num');
            });
        }
        if (Schema::hasColumn('videos', 'episode')) {
            Schema::table('videos', function (Blueprint $table) {
                $table->renameColumn('episode', 'episode_num');
            });
        }
    }

    public function down()
    {
        //
    }
}
