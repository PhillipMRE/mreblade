<?php

namespace App\Models;

use App\Traits\Auditable;
use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Customer extends Model
{
    use SoftDeletes, Auditable, HasFactory;

    public $table = 'customers';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'active',
        'published',
        'name',
        'description',
        'rates',
        'email',
        'technical_contact_email',
        'phone',
        'license',
        'address',
        'city',
        'state',
        'zip',
        'website',
        'template',
        'level',
        'settings',
        'disclosure',
        'estimated_mortgage_disclosure',
        'hubspot',
        'block_mre',
        'block_login_as',
        'ep',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function customerEmailHistories()
    {
        return $this->hasMany(EmailHistory::class, 'customer_id', 'id');
    }
}
