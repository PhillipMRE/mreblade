<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientsTable extends Migration
{
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->boolean('published')->default(0)->nullable();
            $table->boolean('archived')->default(0)->nullable();
            $table->boolean('claimed')->default(0)->nullable();
            $table->boolean('suspended')->default(0)->nullable();
            $table->string('name')->nullable();
            $table->string('settings')->nullable();
            $table->string('category')->nullable();
            $table->string('stub')->nullable();
            $table->string('muted')->nullable();
            $table->datetime('muted_at')->nullable();
            $table->string('source')->nullable();
            $table->string('sub_source')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
