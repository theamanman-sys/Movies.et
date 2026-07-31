<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RenameFileEntryModelsTableColumns extends Migration
{
    public function up()
    {
        if (Schema::hasColumn('file_entry_models', 'upload_id')) {
            Schema::table('file_entry_models', function (Blueprint $table) {
                $table->renameColumn('upload_id', 'file_entry_id');
            });
        }
        if (Schema::hasColumn('file_entry_models', 'uploadable_id')) {
            Schema::table('file_entry_models', function (Blueprint $table) {
                $table->renameColumn('uploadable_id', 'model_id');
            });
        }
        if (Schema::hasColumn('file_entry_models', 'uploadable_type')) {
            Schema::table('file_entry_models', function (Blueprint $table) {
                $table->renameColumn('uploadable_type', 'model_type');
            });
        }
    }

    public function down()
    {
        if (Schema::hasColumn('file_entry_models', 'file_entry_id')) {
            Schema::table('file_entry_models', function (Blueprint $table) {
                $table->renameColumn('file_entry_id', 'upload_id');
            });
        }
        if (Schema::hasColumn('file_entry_models', 'model_id')) {
            Schema::table('file_entry_models', function (Blueprint $table) {
                $table->renameColumn('model_id', 'uploadable_id');
            });
        }
        if (Schema::hasColumn('file_entry_models', 'model_type')) {
            Schema::table('file_entry_models', function (Blueprint $table) {
                $table->renameColumn('model_type', 'uploadable_type');
            });
        }
    }
}
