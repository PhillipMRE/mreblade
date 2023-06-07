<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToCustomersTable extends Migration
{
    public function up()
    {
        Schema::table('customers', function (Blueprint $table) {
            $table->unsignedBigInteger('lending_officer_id')->nullable();
            $table->foreign('lending_officer_id', 'lending_officer_fk_8585993')->references('id')->on('lending_officers');
        });
    }
}
