<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        if (Schema::hasColumn('videos', 'positive_votes')) {
            Schema::table('videos', function (Blueprint $table) {
                $table->renameColumn('positive_votes', 'upvotes');
            });
        }
        if (Schema::hasColumn('videos', 'negative_votes')) {
            Schema::table('videos', function (Blueprint $table) {
                $table->renameColumn('negative_votes', 'downvotes');
            });
        }
    }

    public function down()
    {
       //
    }
};
