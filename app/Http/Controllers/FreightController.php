<?php

namespace App\Http\Controllers;

use App\Helpers;
use App\Enums\TrackingStatus;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreFreightRequest;
use App\Models\Tracking;


class FreightController extends Controller
{
    public function store(StoreFreightRequest $request)
    {
        $dados = $request->all();
        $dados['tracker_code'] = Helpers::generateCode();
        $dados['status'] = TrackingStatus::Progress;


        $freight = Tracking::create($dados);

        return $freight;
    }
}
