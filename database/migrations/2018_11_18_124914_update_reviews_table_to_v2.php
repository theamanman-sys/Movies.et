<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateReviewsTableToV2 extends Migration
{
    public function up()
    {
        if (Schema::hasColumn('reviews', 'title_id')) {
            Schema::table('reviews', function (Blueprint $table) {
                $table->renameColumn('title_id', 'reviewable_id');
            });
        }
        Schema::table('reviews', function (Blueprint $table) {
            $table->string('reviewable_type')->nullable()->index();
        });
        if (Schema::hasColumn('reviews', 'temp_id')) {
            Schema::table('reviews', function (Blueprint $table) {
                $table->dropColumn('temp_id');
            });
        }
    }

    public function down()
    {
        Schema::table('reviews', function (Blueprint $table) {
            //
        });
    }
}
