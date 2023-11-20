<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CapabilityResource\Pages;
use App\Filament\Resources\CapabilityResource\RelationManagers;
use App\Models\Capability;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Textarea;
use Illuminate\Support\Facades\Auth;

class CapabilityResource extends Resource
{
    protected static ?string $model = Capability::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
{
    return $form->schema([
        Fieldset::make('Geographic Service Area')->schema([
            TextInput::make('geographic_service_area_miles')
                ->label('Geographic Service Area (miles)')
                ->nullable(),

            TextInput::make('no_mileage_charge_area_miles')
                ->label('Area without Mileage Charges (miles)')
                ->nullable(),
        ]),

        Fieldset::make('Service Response Times')->schema([
            TextInput::make('service_response_time_in_service_area')
                ->label('Response Time in Service Area (e.g., "3 hours", "1 day")')
                ->nullable(),

            TextInput::make('service_response_time_in_no_charge_area')
                ->label('Response Time in No Charge Area (e.g., "3 hours", "1 day")')
                ->nullable(),
        ]),

        Fieldset::make('Warranty Limits')->schema([
            TextInput::make('workmanship_warranty')
                ->label('Workmanship Warranty (e.g., "1 year", "6 months")')
                ->nullable(),

            TextInput::make('supplies_materials_warranty')
                ->label('Supplies/Materials Warranty (e.g., "1 year", "6 months")')
                ->nullable(),
        ]),

        Fieldset::make('Service Markup and Vehicles')->schema([
            TextInput::make('standard_markup_percentage')
                ->label('Standard Markup Percentage (%)')
                ->nullable(),

            Toggle::make('vehicles_fully_equipped')
                ->label('Are vehicles fully equipped?')
                ->nullable(),
        ]),

        Textarea::make('special_notes')
            ->label('Special Notes')
            ->nullable(),

        // Include a hidden input for the user ID
        Hidden::make('user_id')->default(Auth::id()),
    ]);
}

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('special_notes'),
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
            'index' => Pages\ListCapabilities::route('/'),
            'create' => Pages\CreateCapability::route('/create'),
            'edit' => Pages\EditCapability::route('/{record}/edit'),
        ];
    }    
}
