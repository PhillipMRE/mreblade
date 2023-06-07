<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToKeywordPrerendersTable extends Migration
{
    public function up()
    {
        Schema::table('keyword_prerenders', function (Blueprint $table) {
            $table->unsignedBigInteger('keyword_id')->nullable();
            $table->foreign('keyword_id', 'keyword_fk_8584793')->references('id')->on('keywords');
        });
    }
}
