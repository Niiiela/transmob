<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Step;

class Tracking extends Model
{
    use HasFactory;

    public function step(): HasMany
    {
        return $this->hasMany(Step::class);
    }
}
