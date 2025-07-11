<?php

namespace App\Models;

use App\Enums\TrackingStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Step;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Tracking extends Model
{
    use HasFactory;

    protected $fillable = [
        'origin', 
        'destination', 
        'tracker_code', 
        'status', 
        'sender_id', 
        'destination_id'  
    ];

    protected $casts = [
        'status' => TrackingStatus::class
    ];

    public function steps(): HasMany  
    {
        return $this->hasMany(Step::class);
    }

    public function sender(): BelongsTo
    {
        return $this->belongsTo(Customer::class, 'sender_id');
    }

    public function receiver(): BelongsTo  
    {
        return $this->belongsTo(Customer::class, 'destination_id');
    }
}