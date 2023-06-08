<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDisclaimerVariablesTable extends Migration
{
    public function up()
    {
        Schema::create('disclaimer_variables', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->nullable();
            $table->longText('description')->nullable();
            $table->string('path')->nullable();
            $table->longText('interpolator')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
