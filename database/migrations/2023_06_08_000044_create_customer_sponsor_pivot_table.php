<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomerSponsorPivotTable extends Migration
{
    public function up()
    {
        Schema::create('customer_sponsor', function (Blueprint $table) {
            $table->unsignedBigInteger('sponsor_id');
            $table->foreign('sponsor_id', 'sponsor_id_fk_8590499')->references('id')->on('sponsors')->onDelete('cascade');
            $table->unsignedBigInteger('customer_id');
            $table->foreign('customer_id', 'customer_id_fk_8590499')->references('id')->on('customers')->onDelete('cascade');
        });
    }
}
