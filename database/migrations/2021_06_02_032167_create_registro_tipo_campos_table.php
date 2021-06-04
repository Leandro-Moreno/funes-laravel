<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegistroTipoCamposTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('registro_tipo_campos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tipo_registro_id')->references('id')->on('tipo_registros');
            $table->integer("orden");
            $table->string("tipo_campo");
            $table->boolean("requerido");
            $table->string("label");
            $table->string("name");
            $table->text('description');
            $table->integer('rows')->nullable();
            $table->integer('cols')->nullable();
            $table->integer('min')->nullable();
            $table->integer('max')->nullable();
            $table->json('option')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('registro_tipo_campos');
    }
}
