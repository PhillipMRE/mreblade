<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToSmsTemplatesTable extends Migration
{
    public function up()
    {
        Schema::table('sms_templates', function (Blueprint $table) {
            $table->unsignedBigInteger('keyword_id')->nullable();
            $table->foreign('keyword_id', 'keyword_fk_8590534')->references('id')->on('keywords');
            $table->unsignedBigInteger('customer_id')->nullable();
            $table->foreign('customer_id', 'customer_fk_8590535')->references('id')->on('customers');
        });
    }
}
