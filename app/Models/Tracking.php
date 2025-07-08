<?php

namespace App\Models;

use App\Enums\TrackingStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Step;

class Tracking extends Model
{
    use HasFactory;

    //para definir quais campos podem ser preenchidos em massa com métodos como create() ou update().
    protected $fillable = 
    [
        'origin', 
        'destination', 
        'tracker_code', 
        'status', 
        'sender_id', 
        'destination_id'
    ];

    //é usada nos models para converter automaticamente os valores dos campos do banco de dados para tipos de dados específicos do PHP (como boolean, datetime, array, etc.).
    protected $casts = 
    [
        'status' => TrackingStatus::class
    ];

    
    public function step(): HasMany
    {
        return $this->hasMany(Step::class);
    }
}
