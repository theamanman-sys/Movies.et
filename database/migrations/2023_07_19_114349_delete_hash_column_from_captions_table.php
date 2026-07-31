<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('video_captions', function (Blueprint $table) {
            if (Schema::hasColumn('video_captions', 'hash')) {
                $table->dropColumn('hash');
            }
        });

        if (Schema::hasColumn('titles', 'year')) {
            Schema::table('titles', function (Blueprint $table) {
                $table->dropColumn('year');
            });
        }
        if (Schema::hasColumn('titles', 'episode_count')) {
            Schema::table('titles', function (Blueprint $table) {
                $table->dropColumn('episode_count');
            });
        }
        if (Schema::hasColumn('titles', 'season_count')) {
            Schema::table('titles', function (Blueprint $table) {
                $table->dropColumn('season_count');
            });
        }

        if (Schema::hasColumn('episodes', 'year')) {
            Schema::table('episodes', function (Blueprint $table) {
                $table->dropColumn('year');
            });
        }
    }

    public function down()
    {
        //
    }
};
