<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class IniTableForeignKeys extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ini_sections', function (Blueprint $table) {
            $table->foreign('ini_type_id')
                ->references('id')
                ->on('ini_types');
        });

        Schema::table('ini_keys', function (Blueprint $table) {
            $table->foreign('ini_section_id')
                ->references('id')
                ->on('ini_sections');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ini_sections', function (Blueprint $table) {
             $table->dropForeign(['ini_type_id']);
        });

        Schema::table('ini_keys', function (Blueprint $table) {
             $table->dropForeign(['ini_section_id']);
        });
    }
}
