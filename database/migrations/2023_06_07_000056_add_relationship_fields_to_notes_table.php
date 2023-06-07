<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToNotesTable extends Migration
{
    public function up()
    {
        Schema::table('notes', function (Blueprint $table) {
            $table->unsignedBigInteger('listing_id')->nullable();
            $table->foreign('listing_id', 'listing_fk_8585997')->references('id')->on('listings');
            $table->unsignedBigInteger('client_id')->nullable();
            $table->foreign('client_id', 'client_fk_8585998')->references('id')->on('clients');
        });
    }
}
