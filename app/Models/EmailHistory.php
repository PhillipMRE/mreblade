<?php

namespace App\Models;

use App\Traits\Auditable;
use Carbon\Carbon;
use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EmailHistory extends Model
{
    use SoftDeletes, Auditable, HasFactory;

    public $table = 'email_histories';

    protected $dates = [
        'ts',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'recipient_email',
        'sender_email',
        'subject',
        'state',
        'opens',
        'clicks',
        'ts',
        'customer_id',
        'msg',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function getTsAttribute($value)
    {
        return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('panel.date_format') . ' ' . config('panel.time_format')) : null;
    }

    public function setTsAttribute($value)
    {
        $this->attributes['ts'] = $value ? Carbon::createFromFormat(config('panel.date_format') . ' ' . config('panel.time_format'), $value)->format('Y-m-d H:i:s') : null;
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id');
    }
}
