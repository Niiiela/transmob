<?php

namespace App\Filament\Resources\TrackingResource\RelationManagers;

use App\Enums\TrackingStatus;
use DragonCode\Contracts\Cashier\Resources\Model;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\FormsComponent;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class StepsRelationManager extends RelationManager
{
    protected static string $relationship = 'steps';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('description')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Select::make('type_status')
                    ->label('Status')
                    ->options(TrackingStatus::toNomeValueArray())
                    ->required()
                
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('description')
            ->columns([
                Tables\Columns\TextColumn::make('description'),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make()
                    ->after(function(Model $steps)
                    {
                        $typeStatus = $this->mountedTableActionsData[0]['type_status'];

                        $newfreight = TrackingStatus::fromName($typeStatus);

                        $steps->tracking->update(['status' => $newfreight]);

                        return redirect(request()->header('Refere'));
                    }),           
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }
}
