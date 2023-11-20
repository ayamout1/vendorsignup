<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AgreementFormResource\Pages;
use App\Filament\Resources\AgreementFormResource\RelationManagers;
use App\Models\AgreementForm;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Auth;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\Toggle;

class AgreementFormResource extends Resource
{
    protected static ?string $model = AgreementForm::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Fieldset::make('Agreement Information')
                    ->schema([
                        Toggle::make('is_certified')
                            ->label('Certify Agreement'),
                        FileUpload::make('signature_path')
                            ->acceptedFileTypes(['.png', '.jpg', '.jpeg','application/pdf'])
                            ->label('Upload Signature')
                            ->helperText('Accepts .png, .jpg, .pdf, .jpeg formats.'),
                        TextInput::make('name')
                            ->label('Name')
                            ->required(),
                        TextInput::make('title')
                            ->label('Title/Position')
                            ->required(),
                        Hidden::make('user_id')->default(Auth::id()),
                    ])->columns(2)
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
                Tables\Columns\TextColumn::make('name'),
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
            'index' => Pages\ListAgreementForms::route('/'),
            'create' => Pages\CreateAgreementForm::route('/create'),
            'edit' => Pages\EditAgreementForm::route('/{record}/edit'),
        ];
    }    
}
