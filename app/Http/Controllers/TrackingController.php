<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tracking;

class TrackingController extends Controller
{
    public function __invoke(Request $request)
    {
        // Recebe o parâmetro da URL ?tracker_code=XYZ123
        $trackerCode = $request->input('tracker_code');

        // Busca no banco
        $trackings = Tracking::where('tracker_code', $trackerCode)
            ->with('step')
            ->first();

            if(! $trackings){
                    return redirect()->back()->with('error', 'Código de rastreamento não encontrado.');
            }

        // Retorna a view
        return view('tracking.index', ['trackings' => $trackings]);
    }
}
