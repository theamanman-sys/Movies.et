<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RenamePersonTitleColumns extends Migration
{
    public function up()
    {
        Schema::table('creditables', function (Blueprint $table) {
            $table->integer('order')->unsigned()->default(0)->index();
            $table->string('department', 100)->nullable();
            $table->string('job', 100)->nullable();
            $table->string('char_name')->nullable()->default(null)->change();
            $table->string('creditable_type', 50)->nullable()->index();
        });

        Schema::table('creditables', function (Blueprint $table) {
            $table->dropColumn('known_for');
        });
        Schema::table('creditables', function (Blueprint $table) {
            $table->dropColumn('created_at');
        });
        Schema::table('creditables', function (Blueprint $table) {
            $table->dropColumn('updated_at');
        });

        if (Schema::hasColumn('creditables', 'actor_id')) {
            Schema::table('creditables', function (Blueprint $table) {
                $table->renameColumn('actor_id', 'person_id');
            });
        }
        if (Schema::hasColumn('creditables', 'title_id')) {
            Schema::table('creditables', function (Blueprint $table) {
                $table->renameColumn('title_id', 'creditable_id');
            });
        }

        Schema::table('creditables', function (Blueprint $table) {
            $table->dropIndex('actor_title_unique');
        });
    }

    public function down()
    {
        Schema::table('person_title', function (Blueprint $table) {
            //
        });
    }
}
