<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateTitlesTableToV2 extends Migration
{
    public function up()
    {
        if (Schema::getConnection()->getDriverName() === 'mysql') {
            DB::getDoctrineSchemaManager()
                ->getDatabasePlatform()
                ->registerDoctrineTypeMapping('enum', 'string');
        }

        Schema::table('titles', function (Blueprint $table) {
            $table->integer('runtime')->unsigned()->nullable()->change();
        });
        Schema::table('titles', function (Blueprint $table) {
            $table->bigInteger('budget')->unsigned()->nullable()->change();
        });
        Schema::table('titles', function (Blueprint $table) {
            $table->bigInteger('revenue')->unsigned()->nullable()->change();
        });
        Schema::table('titles', function (Blueprint $table) {
            $table->decimal('tmdb_rating', 3, 1)->default(null)->nullable()->change();
        });
        Schema::table('titles', function (Blueprint $table) {
            $table->integer('tmdb_popularity')->unsigned()->nullable()->change();
        });

        Schema::table('titles', function (Blueprint $table) {
            $table->integer('tmdb_vote_count')->unsigned()->nullable();
            $table->string('certification', 50)->nullable()->index();
            $table->integer('episode_count')->unsigned()->nullable();
            $table->boolean('series_ended')->unsigned()->default(0);
            $table->boolean('is_series')->unsigned()->default(0);
            $table->decimal('local_vote_average', 3, 1)->unsigned()->nullable();
        });

        Schema::table('titles', function (Blueprint $table) {
            $table->dropColumn('awards');
        });
        Schema::table('titles', function (Blueprint $table) {
            $table->dropColumn('mc_user_score');
        });
        Schema::table('titles', function (Blueprint $table) {
            $table->dropColumn('mc_critic_score');
        });
        Schema::table('titles', function (Blueprint $table) {
            $table->dropColumn('mc_num_of_votes');
        });
        Schema::table('titles', function (Blueprint $table) {
            $table->dropColumn('imdb_rating');
        });
        Schema::table('titles', function (Blueprint $table) {
            $table->dropColumn('imdb_votes_num');
        });
        Schema::table('titles', function (Blueprint $table) {
            $table->dropColumn('featured');
        });
        Schema::table('titles', function (Blueprint $table) {
            $table->dropColumn('now_playing');
        });
        Schema::table('titles', function (Blueprint $table) {
            $table->dropColumn('custom_field');
        });
        Schema::table('titles', function (Blueprint $table) {
            $table->dropColumn('temp_id');
        });

        if (Schema::getConnection()->getDriverName() === 'mysql') {
            Schema::table('titles', function (Blueprint $table) {
                $prefix = DB::getTablePrefix();
                DB::statement("ALTER TABLE {$prefix}titles CHANGE background backdrop varchar(255) NULL");
                DB::statement("ALTER TABLE {$prefix}titles CHANGE plot description text NULL");
                DB::statement("ALTER TABLE {$prefix}titles CHANGE tmdb_rating tmdb_vote_average decimal(3,1) NULL");
                DB::statement("ALTER TABLE {$prefix}titles CHANGE season_number season_count integer unsigned NULL");
                DB::statement("ALTER TABLE {$prefix}titles CHANGE title name varchar(255) NULL");
                DB::statement("ALTER TABLE {$prefix}titles CHANGE fully_scraped fully_synced tinyint unsigned default 0");
                DB::statement("ALTER TABLE {$prefix}titles CHANGE tmdb_popularity popularity integer unsigned null");
            });
        } else {
            if (Schema::hasColumn('titles', 'background')) {
                Schema::table('titles', function (Blueprint $table) {
                    $table->renameColumn('background', 'backdrop');
                });
            }
            if (Schema::hasColumn('titles', 'plot')) {
                Schema::table('titles', function (Blueprint $table) {
                    $table->renameColumn('plot', 'description');
                });
            }
            if (Schema::hasColumn('titles', 'tmdb_rating')) {
                Schema::table('titles', function (Blueprint $table) {
                    $table->renameColumn('tmdb_rating', 'tmdb_vote_average');
                });
            }
            if (Schema::hasColumn('titles', 'season_number')) {
                Schema::table('titles', function (Blueprint $table) {
                    $table->renameColumn('season_number', 'season_count');
                });
            }
            if (Schema::hasColumn('titles', 'title')) {
                Schema::table('titles', function (Blueprint $table) {
                    $table->renameColumn('title', 'name');
                });
            }
            if (Schema::hasColumn('titles', 'fully_scraped')) {
                Schema::table('titles', function (Blueprint $table) {
                    $table->renameColumn('fully_scraped', 'fully_synced');
                });
            }
            if (Schema::hasColumn('titles', 'tmdb_popularity')) {
                Schema::table('titles', function (Blueprint $table) {
                    $table->renameColumn('tmdb_popularity', 'popularity');
                });
            }
        }
    }

    public function down()
    {
        Schema::table('titles', function (Blueprint $table) {
            //
        });
    }
}
