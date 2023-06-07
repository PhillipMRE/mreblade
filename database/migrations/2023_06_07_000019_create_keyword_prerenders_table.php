<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKeywordPrerendersTable extends Migration
{
    public function up()
    {
        Schema::create('keyword_prerenders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('url')->nullable();
            $table->string('memento')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
