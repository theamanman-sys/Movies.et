<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateEpisodesTableToV2 extends Migration
{
    public function up()
    {
        Schema::table('episodes', function (Blueprint $table) {
            $table->string('release_date')->nullable()->change();
            $table->integer('tmdb_vote_count')->unsigned()->nullable();
            $table->decimal('tmdb_vote_average', 3, 1)->nullable();
            $table->decimal('local_vote_average', 3, 1)->nullable();
            $table->smallInteger('year')->unsigned()->nullable();
            $table->integer('popularity')->unsigned()->nullable()->index();
            $table->index('title_id');
        });

        if (Schema::hasColumn('episodes', 'plot')) {
            Schema::table('episodes', function (Blueprint $table) {
                $table->renameColumn('plot', 'description');
            });
        }
        if (Schema::hasColumn('episodes', 'title')) {
            Schema::table('episodes', function (Blueprint $table) {
                $table->renameColumn('title', 'name');
            });
        }

        if (Schema::hasColumn('episodes', 'promo')) {
            Schema::table('episodes', function (Blueprint $table) {
                $table->dropColumn('promo');
            });
        }
        if (Schema::hasColumn('episodes', 'temp_id')) {
            Schema::table('episodes', function (Blueprint $table) {
                $table->dropColumn('temp_id');
            });
        }
    }

    public function down()
    {
        //
    }
}
