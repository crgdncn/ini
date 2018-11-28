<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddDescriptionColumnsToIniModels extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ini_types', function (Blueprint $table) {
            $table->text('description')->after('name')->nullable();
        });

        Schema::table('ini_sections', function (Blueprint $table) {
            $table->text('description')->after('name')->nullable();
        });

        Schema::table('ini_keys', function (Blueprint $table) {
            $table->text('description')->after('name')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ini_types', function (Blueprint $table) {
            $table->dropColumn('description');
        });

        Schema::table('ini_sections', function (Blueprint $table) {
            $table->dropColumn('description');
        });

        Schema::table('ini_keys', function (Blueprint $table) {
            $table->dropColumn('description');
        });
    }
}
