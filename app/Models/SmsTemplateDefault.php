<?php

namespace App\Models;

use App\Traits\Auditable;
use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SmsTemplateDefault extends Model
{
    use SoftDeletes, Auditable, HasFactory;

    public $table = 'sms_template_defaults';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'nickname',
        'app_share_buyer',
        'app_share_agent',
        'app_share_lending_officer',
        'app_delivered_buyer',
        'app_delivered_agent',
        'app_delivered_lending_officer',
        'listing_viewed_agent',
        'listing_viewed_lending_officer',
        'listing_shared_buyer',
        'listing_shared_agent',
        'listing_shared_lending_officer',
        'listing_favorited_agent',
        'listing_favorited_lending_officer',
        'request_showing_agent',
        'request_showing_lending_officer',
        'quote_request_lending_officer',
        'referred_lending_officer',
        'welcome_sent_from_admin_lending_officer',
        'welcome_sent_from_admin_agent',
        'shared_property_alert_agent',
        'shared_property_alert_buyer',
        'shared_property_alert_lending_officer',
        'favorited_changed_buyer',
        'keyword_id',
        'customer_id',
        'new_property_alert_buyer',
        'off_hours_agent',
        'returning_client_agent',
        'direct_registration_agent',
        'direct_registration_lending_officer',
        'sms_reply_lending_officer',
        'sms_reply_agent',
        'listings_new_agent',
        'listings_new_lending_officer',
        'unreachable_client_agent',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function keyword()
    {
        return $this->belongsTo(Keyword::class, 'keyword_id');
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id');
    }
}
