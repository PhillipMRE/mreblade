<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomersTable extends Migration
{
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->boolean('active')->default(0)->nullable();
            $table->boolean('published')->default(0)->nullable();
            $table->string('name')->nullable();
            $table->longText('description')->nullable();
            $table->string('rates')->nullable();
            $table->string('email')->nullable();
            $table->string('technical_contact_email')->nullable();
            $table->string('phone')->nullable();
            $table->string('license')->nullable();
            $table->string('address')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->string('zip')->nullable();
            $table->longText('website')->nullable();
            $table->longText('template')->nullable();
            $table->string('level')->nullable();
            $table->longText('disclosure')->nullable();
            $table->longText('estimated_mortgage_disclosure')->nullable();
            $table->string('hubspot')->nullable();
            $table->boolean('block_mre')->default(0)->nullable();
            $table->integer('block_login_as')->nullable();
            $table->boolean('ep')->default(0)->nullable();
            $table->string('fusebill')->nullable();
            $table->longText('settings')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
