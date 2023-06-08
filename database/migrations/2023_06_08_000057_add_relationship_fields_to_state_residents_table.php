<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToStateResidentsTable extends Migration
{
    public function up()
    {
        Schema::table('state_residents', function (Blueprint $table) {
            $table->unsignedBigInteger('board_id')->nullable();
            $table->foreign('board_id', 'board_fk_8589804')->references('id')->on('boards');
        });
    }
}
