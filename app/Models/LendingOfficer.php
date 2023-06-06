<?php

namespace App\Models;

use App\Traits\Auditable;
use Carbon\Carbon;
use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class LendingOfficer extends Model implements HasMedia
{
    use SoftDeletes, InteractsWithMedia, Auditable, HasFactory;

    public $table = 'lending_officers';

    protected $dates = [
        'welcome_sent',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'published',
        'user_id',
        'display_name',
        'notify_phone',
        'contact_phone',
        'timezone',
        'call_line',
        'biography',
        'license',
        'website',
        'facebook',
        'youtube',
        'linkedin',
        'twitter',
        'instagram',
        'settings',
        'office',
        'template',
        'user_confirmed_info',
        'demo',
        'rates',
        'hubspot',
        'remote',
        'welcome_sent',
        'phone_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')->fit('crop', 50, 50);
        $this->addMediaConversion('preview')->fit('crop', 120, 120);
    }

    public function lendingOfficerCustomers()
    {
        return $this->hasMany(Customer::class, 'lending_officer_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function getWelcomeSentAttribute($value)
    {
        return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('panel.date_format') . ' ' . config('panel.time_format')) : null;
    }

    public function setWelcomeSentAttribute($value)
    {
        $this->attributes['welcome_sent'] = $value ? Carbon::createFromFormat(config('panel.date_format') . ' ' . config('panel.time_format'), $value)->format('Y-m-d H:i:s') : null;
    }

    public function phone_numbers()
    {
        return $this->belongsToMany(Phone::class);
    }

    public function phone()
    {
        return $this->belongsTo(Phone::class, 'phone_id');
    }
}
