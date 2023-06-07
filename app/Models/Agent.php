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

class Agent extends Model implements HasMedia
{
    use SoftDeletes, InteractsWithMedia, Auditable, HasFactory;

    public $table = 'agents';

    protected $dates = [
        'vetting_data',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'published',
        'is_vetted',
        'user_confirmed_info',
        'demo',
        'user_id',
        'display_name',
        'timezone',
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
        'vetting_data',
        'callout_text',
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

    public function agentClients()
    {
        return $this->hasMany(Client::class, 'agent_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function getVettingDataAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setVettingDataAttribute($value)
    {
        $this->attributes['vetting_data'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function phones()
    {
        return $this->belongsToMany(Phone::class);
    }
}
