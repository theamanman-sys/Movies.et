<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdatePeopleTableToV2 extends Migration
{
    public function up()
    {
        if (Schema::hasColumn('people', 'sex')) {
            Schema::table('people', function (Blueprint $table) {
                $table->renameColumn('sex', 'gender');
            });
        }
        if (Schema::hasColumn('people', 'bio')) {
            Schema::table('people', function (Blueprint $table) {
                $table->renameColumn('bio', 'description');
            });
        }
        if (Schema::hasColumn('people', 'image')) {
            Schema::table('people', function (Blueprint $table) {
                $table->renameColumn('image', 'poster');
            });
        }

        Schema::table('people', function (Blueprint $table) {
            $table->dropColumn('awards');
        });
        Schema::table('people', function (Blueprint $table) {
            $table->dropColumn('fully_scraped');
        });
        Schema::table('people', function (Blueprint $table) {
            $table->dropColumn('temp_id');
        });
        Schema::table('people', function (Blueprint $table) {
            $table->dropColumn('full_bio_link');
        });

        Schema::table('people', function (Blueprint $table) {
            $table->boolean('fully_synced');
            $table->string('known_for', 50)->nullable();
            $table->integer('popularity')->default(0)->index();
            $table->string('death_date')->nullable();
        });
    }

    public function down()
    {
        if (Schema::hasColumn('people', 'gender')) {
            Schema::table('people', function (Blueprint $table) {
                $table->renameColumn('gender', 'sex');
            });
        }
        if (Schema::hasColumn('people', 'description')) {
            Schema::table('people', function (Blueprint $table) {
                $table->renameColumn('description', 'bio');
            });
        }
        if (Schema::hasColumn('people', 'poster')) {
            Schema::table('people', function (Blueprint $table) {
                $table->renameColumn('poster', 'image');
            });
        }
    }
}
