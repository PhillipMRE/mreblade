<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKeywordAppsTable extends Migration
{
    public function up()
    {
        Schema::create('keyword_apps', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->nullable();
            $table->string('short_name')->nullable();
            $table->longText('description')->nullable();
            $table->longText('template')->nullable();
            $table->string('apple_version')->nullable();
            $table->string('google_version')->nullable();
            $table->string('apple_mre_version')->nullable();
            $table->string('google_mre_version')->nullable();
            $table->string('apple')->nullable();
            $table->string('google')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
