<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSmsTemplateDefaultsTable extends Migration
{
    public function up()
    {
        Schema::create('sms_template_defaults', function (Blueprint $table) {
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
            $table->longText('listing_shared_buyer')->nullable();
            $table->longText('listing_shared_agent')->nullable();
            $table->longText('listing_shared_lending_officer')->nullable();
            $table->longText('listing_favorited_agent')->nullable();
            $table->longText('listing_favorited_lending_officer')->nullable();
            $table->longText('request_showing_agent')->nullable();
            $table->longText('request_showing_lending_officer')->nullable();
            $table->longText('quote_request_lending_officer')->nullable();
            $table->longText('referred_lending_officer')->nullable();
            $table->longText('welcome_sent_from_admin_lending_officer')->nullable();
            $table->longText('welcome_sent_from_admin_agent')->nullable();
            $table->longText('shared_property_alert_agent')->nullable();
            $table->longText('shared_property_alert_buyer')->nullable();
            $table->longText('shared_property_alert_lending_officer')->nullable();
            $table->longText('favorited_changed_buyer')->nullable();
            $table->longText('new_property_alert_buyer')->nullable();
            $table->longText('off_hours_agent')->nullable();
            $table->longText('returning_client_agent')->nullable();
            $table->longText('direct_registration_agent')->nullable();
            $table->longText('direct_registration_lending_officer')->nullable();
            $table->longText('sms_reply_lending_officer')->nullable();
            $table->longText('sms_reply_agent')->nullable();
            $table->longText('listings_new_agent')->nullable();
            $table->longText('listings_new_lending_officer')->nullable();
            $table->longText('unreachable_client_agent')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
