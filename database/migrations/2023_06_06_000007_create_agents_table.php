<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAgentsTable extends Migration
{
    public function up()
    {
        Schema::create('agents', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->boolean('published')->default(0)->nullable();
            $table->boolean('is_vetted')->default(0)->nullable();
            $table->boolean('user_confirmed_info')->default(0)->nullable();
            $table->boolean('demo')->default(0)->nullable();
            $table->string('display_name')->nullable();
            $table->string('timezone')->nullable();
            $table->string('call_line')->nullable();
            $table->longText('biography')->nullable();
            $table->string('license')->nullable();
            $table->string('website')->nullable();
            $table->string('facebook')->nullable();
            $table->string('youtube')->nullable();
            $table->string('linkedin')->nullable();
            $table->string('twitter')->nullable();
            $table->string('instagram')->nullable();
            $table->string('settings')->nullable();
            $table->string('office')->nullable();
            $table->longText('template')->nullable();
            $table->date('vetting_data')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
