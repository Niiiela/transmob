<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Step extends Model
{
     use HasFactory;

     protected $fillable =
     [
          "tracking_id", 
          "description",
     ];

     public function tracking(): BelongsTo
     {
          return $this->belongsTo(Tracking::class);
     }
}
