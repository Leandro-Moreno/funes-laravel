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
            $table->string("eprint_status");
            $table->text("title")->nullable();
            $table->string("type")->nullable();
            $table->text("abstract")->nullable();
            //Thesis
            $table->integer("thesis_type")->nullable();
            //Monograph
            $table->string("monograph_type")->nullable();
            $table->string("institution")->nullable();
            $table->string("department")->nullable();
            $table->string("place_of_pub")->nullable();
            //Conference Item
            $table->string("composition")->nullable();
            //Dataset
            $table->string("data_type")->nullable();
            //Book Book_section actas_congresos edited_book

            //Exhibition
            $table->string("exhibitors")->nullable();
            $table->string("num_pieces")->nullable();
            //Composition && performance
            $table->string("producers")->nullable();
            $table->string("conducters")->nullable();
            $table->string("accompaniment")->nullable();
            //Composition
            $table->string("lyricists")->nullable();
            //book_section, book, article,actas_congresos,edited_book
            $table->string("refereed")->nullable();
            //not artifact, not exhibition, not monograph, not conference_item
            $table->string("ispublished")->nullable();
            //Patent
            $table->string("patent_applicant")->nullable();

            $table->integer('date_year')->nullable();
            $table->string('date_month')->nullable();
            $table->string('date_day')->nullable();
            $table->string("date_type")->nullable();
            $table->string("official_url")->nullable();
            $table->string("pages")->nullable();
            $table->integer("id_number")->nullable();
            $table->string("publisher")->nullable();

            $table->string("book_title")->nullable();
            $table->string("series")->nullable();
            $table->string("volume")->nullable();
            $table->string("number")->nullable();
            $table->string("isbn")->nullable();
            $table->string("pagerange")->nullable();
            $table->string("issn")->nullable();
            $table->string("publication")->nullable();

            //artefact
            $table->string("output_media")->nullable();
            $table->string("related_url")->nullable();

            //informacion Evento
            $table->string("event_title")->nullable();
            $table->string("event_location")->nullable();
            $table->string("event_type")->nullable();
            $table->string("event_dates")->nullable();

            $table->string("pedagogic_type")->nullable();
            $table->string("completition_time")->nullable();
            $table->string("task_purpose")->nullable();
            $table->string("skill_areas")->nullable();
            $table->string("learning_level")->nullable();

            $table->string("funders")->nullable();
            $table->text("referencetext")->nullable();
            $table->string("pres_type")->nullable();
            $table->string("metadata_visibility")->nullable();
            $table->integer("item_issues_count")->nullable();

            $table->foreignId('estado_id')->nullable()->references('id')->on('estados');
            $table->foreignId('nivel_educativo_id')->nullable()->references('id')->on('nivel_educativo');
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
