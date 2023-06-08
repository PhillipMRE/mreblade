<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToContactsTable extends Migration
{
    public function up()
    {
        Schema::table('contacts', function (Blueprint $table) {
            $table->unsignedBigInteger('client_id')->nullable();
            $table->foreign('client_id', 'client_fk_8597626')->references('id')->on('clients');
            $table->unsignedBigInteger('carrier_id')->nullable();
            $table->foreign('carrier_id', 'carrier_fk_8597627')->references('id')->on('carriers');
        });
    }
}
