<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToSponsorsTable extends Migration
{
    public function up()
    {
        Schema::table('sponsors', function (Blueprint $table) {
            $table->unsignedBigInteger('client_id')->nullable();
            $table->foreign('client_id', 'client_fk_8590481')->references('id')->on('clients');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id', 'user_fk_8590482')->references('id')->on('users');
        });
    }
}
