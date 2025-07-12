<?php

namespace App\Filament\Resources\TrackingResource\Pages;

use App\Enums\TrackingStatus;
use App\Filament\Resources\TrackingResource;
use App\Helpers;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateTracking extends CreateRecord
{
    protected static string $resource = TrackingResource::class;

    //mutateFormDataBeforeCreate é um método de um Resource usado para alterar os dados do formulário antes de um novo registro 
    //ser criado no banco de dados.
    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data ['tracker_code'] = Helpers::generateCode();
        $data['status'] = TrackingStatus::Progress;
        
        return $data;   
    }
}
