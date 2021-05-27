<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegistrosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('registros', function (Blueprint $table) {
            $table->id();
            $table->string("nombre");
            $table->string("tipo_de_documento");
            $table->string("documento");
            $table->text("resumen");
            $table->integer("tipo_de_tesis")->nullable();
            $table->integer("tipo_de_publicacion")->nullable();
            $table->string("tipo_de_datos")->nullable();
            //informacion adicional
            $table->boolean("arbitrado")->nullable();
            $table->foreignId('estado_id')->references('id')->on('estados');
            $table->string("titulo_publicacion");
            $table->string("lugar_publicacion")->nullable();
            $table->integer("total_paginas")->nullable();
            $table->string("issn")->nullable();
            $table->string("tipo_de_medio");
            $table->string("editor")->nullable();
            $table->integer('año_publicacion');
            $table->integer('mes_publicacion')->nullable();
            $table->integer('dia_publicacion')->nullable();
            $table->string("tipo_de_fecha")->nullable();
            $table->string("numero_identificacion")->nullable();
            $table->string("numero_serie")->nullable();
            $table->string("isbn")->nullable();
            $table->string("url_oficial")->nullable();
            $table->string("institucion")->nullable();
            $table->string("facultad")->nullable();
            $table->string("volumen")->nullable();
            $table->integer("numero_publicacion")->nullable();
            $table->integer("pagina_de")->nullable();
            $table->integer("pagina_hasta")->nullable();
            $table->text("referencias");
            //fin detalles
            //info pedagogico
            $table->integer("tipo_pedagogico")->nullable();
            $table->string("fecha_pedagogico")->nullable();
            $table->text("proposito_pedagogico")->nullable();
            $table->string("grado_pedagogico")->nullable();
            //informacion Evento
            $table->string("nombre_evento")->nullable();
            $table->integer("tipo_evento")->nullable();
            $table->string("lugar_evento")->nullable();
            $table->string("fechas_evento")->nullable();
            //
            $table->string("enfoque")->nullable();
            $table->foreignId('nivel_educativo_id')->references('id')->on('nivel_educativo')->nullable();
            $table->string("correo_contacto")->nullable();
            $table->text("notas")->nullable();
            $table->text("comentarios")->nullable();
            $table->foreignId('user_deposito_id')->references('id')->on('users')->nullable();
            $table->foreignId('user_edicion_id')->references('id')->on('users')->nullable();
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
        Schema::dropIfExists('registros');
    }
}
