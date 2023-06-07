<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKeywordsTable extends Migration
{
    public function up()
    {
        Schema::create('keywords', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->nullable();
            $table->longText('template')->nullable();
            $table->longText('map')->nullable();
            $table->longText('house_types')->nullable();
            $table->longText('status_types')->nullable();
            $table->string('shortcode')->nullable();
            $table->longText('listing_settings')->nullable();
            $table->string('sponsor_only')->nullable();
            $table->boolean('show_solds')->default(0)->nullable();
            $table->boolean('use_version_5')->default(0)->nullable();
            $table->boolean('active')->default(0)->nullable();
            $table->boolean('listhub')->default(0)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
