<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStatusTypesTable extends Migration
{
    public function up()
    {
        Schema::create('status_types', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->nullable();
            $table->string('listing_status')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
