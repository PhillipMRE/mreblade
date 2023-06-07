<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBoardsTable extends Migration
{
    public function up()
    {
        Schema::create('boards', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->boolean('published')->default(0)->nullable();
            $table->string('name')->nullable();
            $table->string('source')->nullable();
            $table->longText('description')->nullable();
            $table->boolean('show_courtesy')->default(0)->nullable();
            $table->boolean('prominent_courtesy_of')->default(0)->nullable();
            $table->longText('disclaimer')->nullable();
            $table->string('state')->nullable();
            $table->longText('general_area')->nullable();
            $table->boolean('agent_roster')->default(0)->nullable();
            $table->longText('sold_data')->nullable();
            $table->boolean('strict_customer')->default(0)->nullable();
            $table->boolean('expand_courtesy_by_default')->default(0)->nullable();
            $table->boolean('include_office_name_on_listing')->default(0)->nullable();
            $table->boolean('include_agent_name_on_listing')->default(0)->nullable();
            $table->boolean('show_tooltip_on_non_mls_data')->default(0)->nullable();
            $table->boolean('hide_days_on_market')->default(0)->nullable();
            $table->string('zoom')->nullable();
            $table->string('latitude')->nullable();
            $table->string('longitude')->nullable();
            $table->datetime('last_sync_at')->nullable();
            $table->longText('private_note')->nullable();
            $table->longText('public_note')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
