<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSmsTemplatesTable extends Migration
{
    public function up()
    {
        Schema::create('sms_templates', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nickname')->nullable();
            $table->longText('app_share_buyer')->nullable();
            $table->longText('app_share_agent')->nullable();
            $table->longText('app_share_lending_officer')->nullable();
            $table->longText('app_delivered_buyer')->nullable();
            $table->longText('app_delivered_agent')->nullable();
            $table->longText('app_delivered_lending_officer')->nullable();
            $table->longText('listing_viewed_agent')->nullable();
            $table->longText('listing_viewed_lending_officer')->nullable();
            $table->longText('shared_property_alert_buyer')->nullable();
            $table->longText('listing_shared_buyer')->nullable();
            $table->longText('request_showing_agent')->nullable();
            $table->longText('quote_request_lending_officer')->nullable();
            $table->longText('request_showing_lending_officer')->nullable();
            $table->longText('welcome_sent_from_admin_lending_officer')->nullable();
            $table->longText('welcome_sent_from_admin_agent')->nullable();
            $table->longText('shared_property_alert_agent')->nullable();
            $table->longText('shared_property_alert_lending_officer')->nullable();
            $table->longText('listing_shared_agent')->nullable();
            $table->longText('listing_shared_lending_officer')->nullable();
            $table->longText('favorited_changed_buyer')->nullable();
            $table->longText('referred_lending_officer')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
