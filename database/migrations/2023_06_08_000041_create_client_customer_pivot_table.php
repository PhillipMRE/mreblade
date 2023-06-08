<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientCustomerPivotTable extends Migration
{
    public function up()
    {
        Schema::create('client_customer', function (Blueprint $table) {
            $table->unsignedBigInteger('customer_id');
            $table->foreign('customer_id', 'customer_id_fk_8596638')->references('id')->on('customers')->onDelete('cascade');
            $table->unsignedBigInteger('client_id');
            $table->foreign('client_id', 'client_id_fk_8596638')->references('id')->on('clients')->onDelete('cascade');
        });
    }
}
