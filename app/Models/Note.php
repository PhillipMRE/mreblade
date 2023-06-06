<?php

namespace App\Models;

use App\Traits\Auditable;
use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Note extends Model
{
    use SoftDeletes, Auditable, HasFactory;

    public $table = 'notes';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'note_type',
        'note',
        'listing_id',
        'client_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public const NOTE_TYPE_SELECT = [
        'private'    => 'Board Private Note',
        'public'     => 'Board Public Note',
        'listing'    => 'Listing Note',
        'seat_note'  => 'Seat History',
        'agent_note' => 'Agent Note',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function listing()
    {
        return $this->belongsTo(Listing::class, 'listing_id');
    }

    public function client()
    {
        return $this->belongsTo(Client::class, 'client_id');
    }
}
