<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'phone',
    ];

    public function sent(): HasMany
    {
        return $this->hasMany(Tracking::class, 'sender_id');
    }

    public function received(): HasMany
    {
        return $this->hasMany(Tracking::class, 'destination_id');
    }
}
