<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('files', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('ini_type_id')->unsigned();
            $table->string('file_name');
            $table->timestamps();
        });

        Schema::table('files', function (Blueprint $table) {
            $table->foreign('ini_type_id')
                ->references('id')
                ->on('ini_types')
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
        Schema::dropIfExists('files');
        Schema::enableForeignkeyConstraints();
    }
}
