<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RenamePublicPathColumnToDiskPrefix extends Migration
{
    public function up()
    {
        if (Schema::getConnection()->getDriverName() === 'mysql') {
            Schema::table('file_entries', function (Blueprint $table) {
                $prefix = DB::getTablePrefix();
                DB::statement("ALTER TABLE {$prefix}file_entries CHANGE public_path disk_prefix VARCHAR(191) NULL");
            });
        } else {
            if (Schema::hasColumn('file_entries', 'public_path')) {
                Schema::table('file_entries', function (Blueprint $table) {
                    $table->renameColumn('public_path', 'disk_prefix');
                });
            }
        }
    }

    public function down()
    {
        Schema::table('file_entries', function (Blueprint $table) {
            //
        });
    }
}
