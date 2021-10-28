<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToSubjects extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('subjects', function (Blueprint $table) {
            $table->foreignId('parent_id')->after('result')->nullable()->references('id')->on('subjects')->onDelete('cascade')->onUpdate('cascade');
            $table->boolean('depositable')->after('result');
            $table->boolean('showable')->after('result');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('subjects', function (Blueprint $table) {
            $table->dropColumn('parent_id');
            $table->dropColumn('depositable');
            $table->dropColumn('showable');
        });
    }
}
