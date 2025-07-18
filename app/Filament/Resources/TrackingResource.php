<?php

namespace App\Filament\Resources;

use App\Enums\TrackingStatus;
use App\Filament\Resources\TrackingResource\Pages;
use App\Filament\Resources\TrackingResource\RelationManagers;
use App\Filament\Resources\TrackingResource\RelationManagers\StepsRelationManager;
use App\Models\Tracking;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class TrackingResource extends Resource
{
    protected static ?string $model = Tracking::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('tracker_code')
                    ->label('Código de Rastreio')
                    ->readOnly()
                    ->default('Código Gerado Automaticamente')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('status')
                    ->readOnly()
                    ->default('Status padrão (Andamento)')
                    ->required(),
                Forms\Components\TextInput::make('origin')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('destination')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Select::make('sender_id')
                    ->label('Remetente')
                    ->relationship('sender', 'name')
                    ->required(),
                Forms\Components\Select::make('destination_id')
                    ->label('Destinatário')
                    ->relationship('receiver', 'name')  
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('origin')
                    ->searchable(),
                Tables\Columns\TextColumn::make('destination')
                    ->searchable(),
                Tables\Columns\TextColumn::make('tracker_code')
                    ->searchable(),
                Tables\Columns\TextColumn::make('status')
                    ->searchable(),
                Tables\Columns\TextColumn::make('sender.name')
                    ->label('Remetente')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('receiver.name')  
                    ->label('Destinatário')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Data de Criação')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->label('Data da última atualização')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            StepsRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListTrackings::route('/'),
            'create' => Pages\CreateTracking::route('/create'),
            'view' => Pages\ViewTracking::route('/{record}'),
        ];
    }
}