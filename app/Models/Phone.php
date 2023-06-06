<?php

namespace App\Models;

use App\Traits\Auditable;
use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Phone extends Model
{
    use SoftDeletes, Auditable, HasFactory;

    public $table = 'phones';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'number',
        'phone_type',
        'agent_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public const PHONE_TYPE_SELECT = [
        'phone'         => 'Phone',
        'notify_phone'  => 'Notify Phone',
        'contact_phone' => 'Contact Phone',
        'agent_phone'   => 'Agent Phone',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function agent()
    {
        return $this->belongsTo(Agent::class, 'agent_id');
    }
}
