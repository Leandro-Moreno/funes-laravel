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
            $table->integer("eprintid")->unique();
            $table->string("title")->nullable();
            $table->string("type")->nullable();
            $table->text("abstract")->nullable();
            $table->integer("tipo_de_tesis")->nullable();
            $table->integer("tipo_de_publicacion")->nullable();
            $table->string("tipo_de_datos")->nullable();
            $table->string("documento")->nullable();
            $table->string("metadata_visibility")->nullable();
            $table->integer("item_issues_count")->nullable();
            //informacion adicional
            $table->string("refereed")->nullable();
            $table->string("ispublished")->nullable();
            //TODO
            $table->foreignId('estado_id')->nullable()->references('id')->on('estados');
            $table->string("titulo_publicacion")->nullable();
            $table->string("lugar_publicacion")->nullable();
            $table->integer("total_paginas")->nullable();
            $table->string("issn")->nullable();
            $table->string("tipo_de_medio")->nullable();
            $table->string("editor")->nullable();
            $table->string('date')->nullable();
            $table->string("date_type")->nullable();
            $table->string("numero_identificacion")->nullable();
            $table->string("numero_serie")->nullable();
            $table->string("isbn")->nullable();
            $table->string("official_url")->nullable();
            $table->string("institucion")->nullable();
            $table->string("facultad")->nullable();
            $table->string("volume")->nullable();
            $table->string("number")->nullable();
            $table->string("publisher")->nullable();
            $table->string("pagerange")->nullable();
            $table->text("referencetext")->nullable();
            $table->string("publication")->nullable();
            //fin detalles
            //info pedagogico
            $table->integer("tipo_pedagogico")->nullable();
            $table->string("fecha_pedagogico")->nullable();
            $table->text("proposito_pedagogico")->nullable();
            $table->string("grado_pedagogico")->nullable();
            //informacion Evento
            $table->string("event_title")->nullable();
            $table->string("event_location")->nullable();
            $table->string("event_type")->nullable();
            $table->string("event_dates")->nullable();
            //
            $table->string("pres_type")->nullable();
            $table->string("enfoque")->nullable();
            $table->foreignId('nivel_educativo_id')->nullable()->references('id')->on('nivel_educativo');
            $table->string("correo_contacto")->nullable();
            $table->text("notas")->nullable();
            $table->text("comentarios")->nullable();
            $table->foreignId('user_deposito_id')->nullable()->references('id')->on('users');
            $table->foreignId('user_edicion_id')->nullable()->references('id')->on('users');
            $table->timestamp('status_changed')->nullable();
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
