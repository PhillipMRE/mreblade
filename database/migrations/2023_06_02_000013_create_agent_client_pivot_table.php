<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAgentClientPivotTable extends Migration
{
    public function up()
    {
        Schema::create('agent_client', function (Blueprint $table) {
            $table->unsignedBigInteger('client_id');
            $table->foreign('client_id', 'client_id_fk_8572089')->references('id')->on('clients')->onDelete('cascade');
            $table->unsignedBigInteger('agent_id');
            $table->foreign('agent_id', 'agent_id_fk_8572089')->references('id')->on('agents')->onDelete('cascade');
        });
    }
}
