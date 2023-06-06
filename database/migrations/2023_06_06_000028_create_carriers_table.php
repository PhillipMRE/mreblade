<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCarriersTable extends Migration
{
    public function up()
    {
        Schema::create('carriers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('carrier')->nullable();
            $table->string('name')->nullable();
            $table->longText('email_to_text')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
