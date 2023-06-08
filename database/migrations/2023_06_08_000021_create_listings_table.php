<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateListingsTable extends Migration
{
    public function up()
    {
        Schema::create('listings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->boolean('published')->default(0)->nullable();
            $table->string('full_address')->nullable();
            $table->string('street_number')->nullable();
            $table->string('street_name')->nullable();
            $table->string('street_type')->nullable();
            $table->string('street_direction')->nullable();
            $table->string('unit_number')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->string('zip')->nullable();
            $table->string('list_price')->nullable();
            $table->string('selling_price')->nullable();
            $table->string('arch_style')->nullable();
            $table->string('parking_spaces')->nullable();
            $table->longText('public_remarks')->nullable();
            $table->longText('private_remarks')->nullable();
            $table->string('area')->nullable();
            $table->date('open_house_date')->nullable();
            $table->time('open_house_time')->nullable();
            $table->string('latitude')->nullable();
            $table->string('longitude')->nullable();
            $table->string('elem_school')->nullable();
            $table->string('mid_school')->nullable();
            $table->string('high_school')->nullable();
            $table->string('district_school')->nullable();
            $table->string('misc_school')->nullable();
            $table->string('m_1')->nullable();
            $table->string('m_2')->nullable();
            $table->string('m_3')->nullable();
            $table->string('m_4')->nullable();
            $table->string('m_5')->nullable();
            $table->string('m_6')->nullable();
            $table->string('m_7')->nullable();
            $table->string('m_8')->nullable();
            $table->string('m_9')->nullable();
            $table->boolean('f_1')->default(0)->nullable();
            $table->boolean('f_2')->default(0)->nullable();
            $table->boolean('f_3')->default(0)->nullable();
            $table->boolean('f_4')->default(0)->nullable();
            $table->boolean('f_5')->default(0)->nullable();
            $table->boolean('f_6')->default(0)->nullable();
            $table->boolean('f_7')->default(0)->nullable();
            $table->boolean('f_8')->default(0)->nullable();
            $table->boolean('f_9')->default(0)->nullable();
            $table->boolean('f_10')->default(0)->nullable();
            $table->boolean('f_11')->default(0)->nullable();
            $table->boolean('f_12')->default(0)->nullable();
            $table->boolean('f_13')->default(0)->nullable();
            $table->boolean('f_14')->default(0)->nullable();
            $table->boolean('f_15')->default(0)->nullable();
            $table->boolean('f_16')->default(0)->nullable();
            $table->boolean('f_17')->default(0)->nullable();
            $table->boolean('f_18')->default(0)->nullable();
            $table->boolean('f_19')->default(0)->nullable();
            $table->boolean('f_20')->default(0)->nullable();
            $table->boolean('f_21')->default(0)->nullable();
            $table->string('house_type')->nullable();
            $table->string('sale_rent')->nullable();
            $table->datetime('ts')->nullable();
            $table->string('add_status')->nullable();
            $table->date('selling_date')->nullable();
            $table->float('prev_price', 12, 2)->nullable();
            $table->datetime('price_change_date')->nullable();
            $table->string('class_name')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
