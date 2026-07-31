<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        if (Schema::hasColumn('videos', 'url')) {
            Schema::table('videos', function (Blueprint $table) {
                $table->renameColumn('url', 'src');
            });
        }
        if (Schema::hasColumn('videos', 'source')) {
            Schema::table('videos', function (Blueprint $table) {
                $table->renameColumn('source', 'origin');
            });
        }
    }

    public function down()
    {
    }
};
