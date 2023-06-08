<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAgentKeywordPivotTable extends Migration
{
    public function up()
    {
        Schema::create('agent_keyword', function (Blueprint $table) {
            $table->unsignedBigInteger('keyword_id');
            $table->foreign('keyword_id', 'keyword_id_fk_8584676')->references('id')->on('keywords')->onDelete('cascade');
            $table->unsignedBigInteger('agent_id');
            $table->foreign('agent_id', 'agent_id_fk_8584676')->references('id')->on('agents')->onDelete('cascade');
        });
    }
}
