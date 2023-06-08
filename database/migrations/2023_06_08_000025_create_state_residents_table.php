<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStateResidentsTable extends Migration
{
    public function up()
    {
        Schema::create('state_residents', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('state')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
