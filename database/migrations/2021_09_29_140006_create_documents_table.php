<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocumentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('documents', function (Blueprint $table) {
            $table->id();
            $table->foreignId('registro_id')->references('id')->on('registros');
            $table->integer('docid');
            $table->integer('pos');
            $table->integer('eprintid');
            $table->string('format');
            $table->string('language')->default('es');
            $table->string('security');
            $table->string('license');
            $table->string('main');
            $table->string('filename');
            $table->string('filesize');
            $table->string('hash')->nullable();
            $table->string('url');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('documents');
    }
}
