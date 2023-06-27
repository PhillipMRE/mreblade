<?php

namespace App\Models;

use App\Traits\Auditable;
use Carbon\Carbon;
use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Listing extends Model
{
    use SoftDeletes, Auditable, HasFactory;

    public $table = 'listings';

    protected $dates = [
        'open_house_date',
        'ts',
        'selling_date',
        'price_change_date',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'published',
        'full_address',
        'street_number',
        'street_name',
        'street_type',
        'street_direction',
        'unit_number',
        'city',
        'state',
        'zip',
        'list_price',
        'selling_price',
        'arch_style',
        'parking_spaces',
        'public_remarks',
        'private_remarks',
        'area',
        'open_house_date',
        'open_house_time',
        'latitude',
        'longitude',
        'elem_school',
        'mid_school',
        'high_school',
        'district_school',
        'misc_school',
        'm_1',
        'm_2',
        'm_3',
        'm_4',
        'm_5',
        'm_6',
        'm_7',
        'm_8',
        'm_9',
        'f_1',
        'f_2',
        'f_3',
        'f_4',
        'f_5',
        'f_6',
        'f_7',
        'f_8',
        'f_9',
        'f_10',
        'f_11',
        'f_12',
        'f_13',
        'f_14',
        'f_15',
        'f_16',
        'f_17',
        'f_18',
        'f_19',
        'f_20',
        'f_21',
        'house_type',
        'sale_rent',
        'ts',
        'add_status',
        'selling_date',
        'prev_price',
        'price_change_date',
        'class_name',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function getOpenHouseDateAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setOpenHouseDateAttribute($value)
    {
        $this->attributes['open_house_date'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getTsAttribute($value)
    {
        return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('panel.date_format').' '.config('panel.time_format')) : null;
    }

    public function setTsAttribute($value)
    {
        $this->attributes['ts'] = $value ? Carbon::createFromFormat(config('panel.date_format').' '.config('panel.time_format'), $value)->format('Y-m-d H:i:s') : null;
    }

    public function getSellingDateAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setSellingDateAttribute($value)
    {
        $this->attributes['selling_date'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getPriceChangeDateAttribute($value)
    {
        return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('panel.date_format').' '.config('panel.time_format')) : null;
    }

    public function setPriceChangeDateAttribute($value)
    {
        $this->attributes['price_change_date'] = $value ? Carbon::createFromFormat(config('panel.date_format').' '.config('panel.time_format'), $value)->format('Y-m-d H:i:s') : null;
    }
}
