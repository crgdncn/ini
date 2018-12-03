<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSectionsKeyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('file_section_keys', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('file_section_id')->unsigned();
            $table->integer('ini_key_id')->unsigned();
            $table->string('value');
            $table->timestamps();
        });

        Schema::table('file_section_keys', function (Blueprint $table) {
            $table->foreign('file_section_id')
                ->references('id')
                ->on('file_sections')
                ->onDelete('cascade');
        });

        Schema::table('file_section_keys', function (Blueprint $table) {
            $table->foreign('ini_key_id')
                ->references('id')
                ->on('ini_keys')
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
        Schema::dropIfExists('section_keys');
        Schema::enableForeignkeyConstraints();
    }
}
