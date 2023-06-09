<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePhoneUserPivotTable extends Migration
{
    public function up()
    {
        Schema::create('phone_user', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id', 'user_id_fk_8590420')->references('id')->on('users')->onDelete('cascade');
            $table->unsignedBigInteger('phone_id');
            $table->foreign('phone_id', 'phone_id_fk_8590420')->references('id')->on('phones')->onDelete('cascade');
        });
    }
}
