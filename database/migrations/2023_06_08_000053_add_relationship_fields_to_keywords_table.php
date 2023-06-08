<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToKeywordsTable extends Migration
{
    public function up()
    {
        Schema::table('keywords', function (Blueprint $table) {
            $table->unsignedBigInteger('customer_id')->nullable();
            $table->foreign('customer_id', 'customer_fk_8584723')->references('id')->on('customers');
            $table->unsignedBigInteger('lending_officer_id')->nullable();
            $table->foreign('lending_officer_id', 'lending_officer_fk_8598381')->references('id')->on('lending_officers');
        });
    }
}
