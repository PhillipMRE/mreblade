<?php

namespace App\Models;

use App\Traits\Auditable;
use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SmsTemplate extends Model
{
    use SoftDeletes, Auditable, HasFactory;

    public $table = 'sms_templates';

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
        'shared_property_alert_buyer',
        'listing_shared_buyer',
        'request_showing_agent',
        'quote_request_lending_officer',
        'request_showing_lending_officer',
        'welcome_sent_from_admin_lending_officer',
        'welcome_sent_from_admin_agent',
        'shared_property_alert_agent',
        'shared_property_alert_lending_officer',
        'listing_shared_agent',
        'listing_shared_lending_officer',
        'favorited_changed_buyer',
        'referred_lending_officer',
        'keyword_id',
        'customer_id',
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
