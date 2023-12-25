<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $tableNames = config('permission.table_names');

        Schema::table($tableNames['permissions'], function (Blueprint $table) {

            $table->after('name', function ($table) {
                $table->string('fr_name', '50')->nullable();
                $table->string('en_name', '50')->nullable();
                $table->string('ar_name', '80')->nullable();
            });
        });

        Schema::table($tableNames['roles'], function (Blueprint $table) {
            $table->after('name', function ($table) {
                $table->string('fr_name', '50')->nullable();
                $table->string('en_name', '50')->nullable();
                $table->string('ar_name', '80')->nullable();
            });
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        $tableNames = config('permission.table_names');
        if (Schema::hasColumn('permissions', 'slug')) {
            Schema::table($tableNames['permissions'], function (Blueprint $table) {
                $table->dropColumn(['fr_name', 'en_name', 'ar_name']);
            });
        }
        if (Schema::hasColumn('roles', 'slug')) {
            Schema::table($tableNames['roles'], function (Blueprint $table) {
                $table->dropColumn(['fr_name', 'en_name', 'ar_name']);
            });
        }
    }
};
