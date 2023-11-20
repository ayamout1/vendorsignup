<?php

namespace App\Filament\Resources;

use App\Filament\Resources\W9SubmissionResource\Pages;
use App\Filament\Resources\W9SubmissionResource\RelationManagers;
use App\Models\W9Submission;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Hidden;
use Illuminate\Support\Facades\Auth;

class W9SubmissionResource extends Resource
{
    protected static ?string $model = W9Submission::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Fieldset::make('W9 Submission')->schema([
                FileUpload::make('file_path')
                    ->label('W9 Document')
                
                    ->required(), // assuming the file is required for submission
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
            'index' => Pages\ListW9Submissions::route('/'),
            'create' => Pages\CreateW9Submission::route('/create'),
            'edit' => Pages\EditW9Submission::route('/{record}/edit'),
        ];
    }    
}
