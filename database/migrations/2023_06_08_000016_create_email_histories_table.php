<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmailHistoriesTable extends Migration
{
    public function up()
    {
        Schema::create('email_histories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('recipient_email')->nullable();
            $table->string('sender_email')->nullable();
            $table->string('subject')->nullable();
            $table->string('state')->nullable();
            $table->string('opens')->nullable();
            $table->string('clicks')->nullable();
            $table->datetime('ts')->nullable();
            $table->longText('msg')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
