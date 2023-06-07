<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCarrierSponsorPivotTable extends Migration
{
    public function up()
    {
        Schema::create('carrier_sponsor', function (Blueprint $table) {
            $table->unsignedBigInteger('sponsor_id');
            $table->foreign('sponsor_id', 'sponsor_id_fk_8590500')->references('id')->on('sponsors')->onDelete('cascade');
            $table->unsignedBigInteger('carrier_id');
            $table->foreign('carrier_id', 'carrier_id_fk_8590500')->references('id')->on('carriers')->onDelete('cascade');
        });
    }
}
