<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RefactorFileEntriesColumns extends Migration
{
    public function up()
    {
        if (Schema::hasColumn('file_entries', 'public_path')) return;

        Schema::table('file_entries', function (Blueprint $table) {
            $table->bigInteger('file_size')->unsigned()->nullable()->change();
        });
        Schema::table('file_entries', function (Blueprint $table) {
            $table->integer('parent_id')->nullable()->index();
        });
        Schema::table('file_entries', function (Blueprint $table) {
            $table->string('description', 150)->nullable();
        });
        Schema::table('file_entries', function (Blueprint $table) {
            $table->string('mime', 100)->nullable()->change();
        });
        Schema::table('file_entries', function (Blueprint $table) {
            $table->string('extension', 10)->nullable()->change();
        });
        Schema::table('file_entries', function (Blueprint $table) {
            $table->string('password', 50)->nullable();
        });
        Schema::table('file_entries', function (Blueprint $table) {
            $table->string('type', 20)->nullable()->index();
        });
        Schema::table('file_entries', function (Blueprint $table) {
            $table->timestamp('deleted_at')->nullable()->index();
        });
        Schema::table('file_entries', function (Blueprint $table) {
            $table->string('user_id')->index()->nullable()->change();
        });
        Schema::table('file_entries', function (Blueprint $table) {
            $table->index('updated_at');
        });

        Schema::table('file_entries', function (Blueprint $table) {
            $table->dropColumn('url');
        });
        Schema::table('file_entries', function (Blueprint $table) {
            $table->dropColumn('thumbnail_url');
        });

        if (Schema::hasColumn('file_entries', 'path')) {
            Schema::table('file_entries', function (Blueprint $table) {
                $table->renameColumn('path', 'public_path');
            });
        }
    }

    public function down()
    {
        Schema::table('file_entries', function (Blueprint $table) {
            $table->dropColumn('parent_id');
        });
        Schema::table('file_entries', function (Blueprint $table) {
            $table->dropColumn('description');
        });
        Schema::table('file_entries', function (Blueprint $table) {
            $table->dropColumn('password');
        });
        Schema::table('file_entries', function (Blueprint $table) {
            $table->dropColumn('deleted_at');
        });
    }
}
