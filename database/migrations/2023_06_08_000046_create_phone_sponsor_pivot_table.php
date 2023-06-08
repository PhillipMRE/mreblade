<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePhoneSponsorPivotTable extends Migration
{
    public function up()
    {
        Schema::create('phone_sponsor', function (Blueprint $table) {
            $table->unsignedBigInteger('sponsor_id');
            $table->foreign('sponsor_id', 'sponsor_id_fk_8590626')->references('id')->on('sponsors')->onDelete('cascade');
            $table->unsignedBigInteger('phone_id');
            $table->foreign('phone_id', 'phone_id_fk_8590626')->references('id')->on('phones')->onDelete('cascade');
        });
    }
}
