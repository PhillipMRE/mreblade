<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuotesTable extends Migration
{
    public function up()
    {
        Schema::create('quotes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('purchase_price')->nullable();
            $table->string('down_payment')->nullable();
            $table->string('credit_score')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
