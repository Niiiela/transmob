<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Step extends Model
{
     use HasFactory;

     protected $fillable =
     [
          "tracking_id", 
          "description",
          "date",
          "created_at",
          "updated_at"
     ];
}
