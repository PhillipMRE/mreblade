<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToStatusTypesTable extends Migration
{
    public function up()
    {
        Schema::table('status_types', function (Blueprint $table) {
            $table->unsignedBigInteger('board_id')->nullable();
            $table->foreign('board_id', 'board_fk_8589825')->references('id')->on('boards');
        });
    }
}
