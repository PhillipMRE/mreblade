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

class Board extends Model implements HasMedia
{
    use SoftDeletes, InteractsWithMedia, Auditable, HasFactory;

    public $table = 'boards';

    protected $dates = [
        'last_sync_at',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'published',
        'name',
        'source',
        'description',
        'show_courtesy',
        'prominent_courtesy_of',
        'disclaimer',
        'state',
        'general_area',
        'agent_roster',
        'sold_data',
        'strict_customer',
        'expand_courtesy_by_default',
        'include_office_name_on_listing',
        'include_agent_name_on_listing',
        'show_tooltip_on_non_mls_data',
        'hide_days_on_market',
        'zoom',
        'latitude',
        'longitude',
        'last_sync_at',
        'private_note',
        'public_note',
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

    public function boardStateResidents()
    {
        return $this->hasMany(StateResident::class, 'board_id', 'id');
    }

    public function getLastSyncAtAttribute($value)
    {
        return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('panel.date_format').' '.config('panel.time_format')) : null;
    }

    public function setLastSyncAtAttribute($value)
    {
        $this->attributes['last_sync_at'] = $value ? Carbon::createFromFormat(config('panel.date_format').' '.config('panel.time_format'), $value)->format('Y-m-d H:i:s') : null;
    }
}
