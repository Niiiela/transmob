<?php

namespace App;

use App\Models\Tracking;
use Illuminate\Support\Str;

class Helpers
{
    static public function generateCode(): string
    {
        do{
            $code = Str::upper(Str::Random(8));

            $thereisShipping = Tracking::where('tracker_code', $code)->exists();
        }while ($thereisShipping);

        return $code;
    }
}