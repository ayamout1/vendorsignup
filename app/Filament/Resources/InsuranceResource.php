<?php

namespace App\Filament\Resources;

use App\Filament\Resources\InsuranceResource\Pages;
use App\Filament\Resources\InsuranceResource\RelationManagers;
use App\Models\Insurance;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Hidden;
use Illuminate\Support\Facades\Auth;

class InsuranceResource extends Resource
{
    protected static ?string $model = Insurance::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Fieldset::make('Vehicle Insurance')->schema([
                FileUpload::make('vehicle_file')
                    ->label('Vehicle Insurance File')
                    ->nullable(),
                
                    DatePicker::make('vehicle_effective_date')
                    ->label('Vehicle Insurance Effective Date')
                    ->nullable(),
    
                    DatePicker::make('vehicle_expiration_date')
                    ->label('Vehicle Insurance Expiration Date')
                    ->nullable(),
            ]),
    
            Fieldset::make('General Liability Insurance')->schema([
                FileUpload::make('general_liability_file')
                    ->label('General Liability Insurance File')
                    ->nullable(),
                
                    DatePicker::make('general_effective_date')
                    ->label('General Liability Effective Date')
                    ->nullable(),
    
                    DatePicker::make('general_expiry_date')
                    ->label('General Liability Expiry Date')
                    ->nullable(),
            ]),
    
            Fieldset::make('Worker Insurance')->schema([
                FileUpload::make('worker_file')
                    ->label('Worker Insurance File')
                    ->nullable(),
                
                    DatePicker::make('worker_effective_date')
                    ->label('Worker Effective Date')
                    ->nullable(),
    
                DatePicker::make('worker_expiry_date')
                    ->label('Worker Expiry Date')
                    ->nullable(),
            ]),
    
            // Include a hidden input for the user ID
            Hidden::make('user_id')->default(Auth::id()),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
                Tables\Columns\TextColumn::make('user_id'),
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
            'index' => Pages\ListInsurances::route('/'),
            'create' => Pages\CreateInsurance::route('/create'),
            'edit' => Pages\EditInsurance::route('/{record}/edit'),
        ];
    }    
}
