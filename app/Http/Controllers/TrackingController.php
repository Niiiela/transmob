<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tracking;

class TrackingController extends Controller
{
    public function __invoke(Request $request)
    {
        // Recebe o parâmetro da URL ?tracker_code=XYZ123
        $trackings = $request->input('tracker_code');

        // Busca no banco
        $trackings = Tracking::where('tracker_code', $trackings)
            ->with('step')
            ->first();

        // Retorna a view
        return view('tracking.index', ['trackings' => $trackings]);
    }
}
