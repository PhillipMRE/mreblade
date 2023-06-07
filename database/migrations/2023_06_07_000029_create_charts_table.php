<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChartsTable extends Migration
{
    public function up()
    {
        Schema::create('charts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('tag')->nullable();
            $table->string('label')->nullable();
            $table->string('chart_model')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
