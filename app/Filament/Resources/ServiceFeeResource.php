<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ServiceFeeResource\Pages;
use App\Filament\Resources\ServiceFeeResource\RelationManagers;
use App\Models\ServiceFee;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Hidden;
use Illuminate\Support\Facades\Auth;

class ServiceFeeResource extends Resource
{
    protected static ?string $model = ServiceFee::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Fieldset::make('Service Fee Information')->schema([
                TextInput::make('concrete_per_yard')
                    ->label('Concrete (per yard)')
                    ->type('number')
                    ->step('0.01'), // For decimal precision
    
                TextInput::make('rebar')
                    ->label('Rebar')
                    ->type('number')
                    ->step('0.01'),
    
                TextInput::make('survey')
                    ->label('Survey')
                    ->type('number')
                    ->step('0.01'),
    
                TextInput::make('permit_staff_per_hour')
                    ->label('Permit Staff (per hour)')
                    ->type('number')
                    ->step('0.01'),
    
                TextInput::make('neon_per_unit_general')
                    ->label('Neon (per unit - general)')
                    ->type('number')
                    ->step('0.01'),
    
                TextInput::make('backhoe_minimum')
                    ->label('Backhoe (minimum)')
                    ->type('number')
                    ->step('0.01'),
    
                TextInput::make('auger_minimum')
                    ->label('Auger (minimum)')
                    ->type('number')
                    ->step('0.01'),
    
                TextInput::make('industrial_crane_minimum')
                    ->label('Industrial Crane (minimum)')
                    ->type('number')
                    ->step('0.01'),
    
                TextInput::make('high_risk_staging')
                    ->label('High Risk Staging')
                    ->type('number')
                    ->step('0.01'),
    
                TextInput::make('truck_1_technician_per_hour')
                    ->label('Truck 1 Technician (per hour)')
                    ->type('number')
                    ->step('0.01'),
    
                TextInput::make('truck_2_technician_per_hour')
                    ->label('Truck 2 Technician (per hour)')
                    ->type('number')
                    ->step('0.01'),
            ])->columns(2), // 2 columns for better visual structure
    
            // Include a hidden input for the user ID
            Hidden::make('user_id')->default(Auth::id()),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
                Tables\Columns\TextColumn::make('concrete_per_yard'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
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
            //
        ];
    }
    
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListServiceFees::route('/'),
            'create' => Pages\CreateServiceFee::route('/create'),
            'edit' => Pages\EditServiceFee::route('/{record}/edit'),
        ];
    }    
}
