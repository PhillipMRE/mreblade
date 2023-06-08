<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLendingOfficerPhonePivotTable extends Migration
{
    public function up()
    {
        Schema::create('lending_officer_phone', function (Blueprint $table) {
            $table->unsignedBigInteger('lending_officer_id');
            $table->foreign('lending_officer_id', 'lending_officer_id_fk_8590431')->references('id')->on('lending_officers')->onDelete('cascade');
            $table->unsignedBigInteger('phone_id');
            $table->foreign('phone_id', 'phone_id_fk_8590431')->references('id')->on('phones')->onDelete('cascade');
        });
    }
}
