<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('file_sections', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('file_id')->unsigned();
            $table->integer('ini_section_id')->unsigned();
            $table->timestamps();
        });

        Schema::table('file_sections', function (Blueprint $table) {
            $table->foreign('file_id')
                ->references('id')
                ->on('files')
                ->onDelete('cascade');
        });

        Schema::table('file_sections', function (Blueprint $table) {
            $table->foreign('ini_section_id')
                ->references('id')
                ->on('ini_sections')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('file_sections');
        Schema::enableForeignkeyConstraints();
    }
}
