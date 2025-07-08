<?php

namespace App\Http\Controllers;

use App\Enums\TrackingStatus;
use App\Http\Requests\StoreStepRequest;
use App\Models\Step;
use App\Models\Tracking;
class StepController extends Controller
{
    public function store(StoreStepRequest $request)
    {
        $tracking  = Tracking::find($request->tracking_id);

        if( $tracking->status == TrackingStatus::DELIVERED)
        {
            return response()->json([
                'message' => 'Não é possível adicionar etapas para um frete que já foi entregue.'
            ], 400);
        }
        $step = Step::Create($request->all());

        $typeFreightStatus = TrackingStatus::fromName($request->tipo);


        $tracking->update(['status' =>$typeFreightStatus]);


        return $step;
    }
}
