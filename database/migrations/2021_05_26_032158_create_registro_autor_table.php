<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegistroAutorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('registro_autor', function (Blueprint $table) {
            $table->integer("orden");
            $table->foreignId('registro_id')->references('id')->on('registros')->onDelete('cascade');
            $table->foreignId('autor_id')->references('id')->on('autors')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('registro_autor');
    }
}
