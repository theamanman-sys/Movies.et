<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangePlanAmountToFloat extends Migration
{
    public function up()
    {
        if (Schema::getConnection()->getDriverName() === 'mysql') {
            Schema::table('billing_plans', function(Blueprint $table) {
                $prefix = DB::getTablePrefix();
                DB::statement("ALTER TABLE {$prefix}billing_plans CHANGE amount amount DECIMAL(13,2) NULL");
            });
        } else {
            Schema::table('billing_plans', function(Blueprint $table) {
                $table->decimal('amount', 13, 2)->nullable()->change();
            });
        }
    }

    public function down()
    {
        Schema::table('billing_plans', function (Blueprint $table) {
            $table->integer('amount')->nullable()->change();
        });
    }
}
