<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToSmsTemplateDefaultsTable extends Migration
{
    public function up()
    {
        Schema::table('sms_template_defaults', function (Blueprint $table) {
            $table->unsignedBigInteger('keyword_id')->nullable();
            $table->foreign('keyword_id', 'keyword_fk_8590611')->references('id')->on('keywords');
            $table->unsignedBigInteger('customer_id')->nullable();
            $table->foreign('customer_id', 'customer_fk_8590612')->references('id')->on('customers');
        });
    }
}
