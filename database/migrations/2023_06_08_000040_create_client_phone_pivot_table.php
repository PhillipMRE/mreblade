<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientPhonePivotTable extends Migration
{
    public function up()
    {
        Schema::create('client_phone', function (Blueprint $table) {
            $table->unsignedBigInteger('client_id');
            $table->foreign('client_id', 'client_id_fk_8590392')->references('id')->on('clients')->onDelete('cascade');
            $table->unsignedBigInteger('phone_id');
            $table->foreign('phone_id', 'phone_id_fk_8590392')->references('id')->on('phones')->onDelete('cascade');
        });
    }
}
