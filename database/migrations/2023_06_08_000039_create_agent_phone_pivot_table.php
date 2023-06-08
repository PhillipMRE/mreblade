<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAgentPhonePivotTable extends Migration
{
    public function up()
    {
        Schema::create('agent_phone', function (Blueprint $table) {
            $table->unsignedBigInteger('agent_id');
            $table->foreign('agent_id', 'agent_id_fk_8590386')->references('id')->on('agents')->onDelete('cascade');
            $table->unsignedBigInteger('phone_id');
            $table->foreign('phone_id', 'phone_id_fk_8590386')->references('id')->on('phones')->onDelete('cascade');
        });
    }
}
