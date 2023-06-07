<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToLendingOfficersTable extends Migration
{
    public function up()
    {
        Schema::table('lending_officers', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id', 'user_fk_8584840')->references('id')->on('users');
            $table->unsignedBigInteger('phone_id')->nullable();
            $table->foreign('phone_id', 'phone_fk_8590432')->references('id')->on('phones');
        });
    }
}
