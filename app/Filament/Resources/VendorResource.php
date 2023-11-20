<?php

namespace App\Filament\Resources;

use App\Filament\Resources\VendorResource\Pages;
use App\Filament\Resources\VendorResource\RelationManagers;
use App\Models\Vendor;
use Filament\Forms;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\EmailInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\Fieldset;
use Illuminate\Support\Facades\Auth;



class VendorResource extends Resource
{
    protected static ?string $model = Vendor::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationLabel = "Vendor | Owner Info";

    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form->schema([
            Fieldset::make('Vendor Information')
                ->schema([
                    TextInput::make('vendor_name'),
                    TextInput::make('owner_name'),
                    TextInput::make('owner_phone')->tel(),
                    Select::make('vendor_type')
                        ->options([
                            'SignageInstallation' => 'Signage Installation',
                            'SignageFabrication' => 'Signage Fabrication',
                            'WallpaperInstallation' => 'Wallpaper Installation',
                            'PaintandRestoration' => 'Paint and Restoration',
                            'Solar' => 'Solar',
                            'Electrical' => 'Electrical',
                            'Plumbing' => 'Plumbing',
                            'Drywall' => 'Drywall',
                            'EIFS' => 'EIFS',
                            'Flooring' => 'Flooring'
                        ]),
                        TextInput::make('vendor_phone'),
                        TextInput::make('vendor_email')
                            ->live(onBlur: true)
                            ->email()->required()->unique(Vendor::class,'vendor_email', ignoreRecord:true),
                        TextInput::make('vendor_fax')->nullable(),
                        TextInput::make('vendor_website')->nullable(),
                        Hidden::make('user_id')->default(Auth::id())
                        
                    
                ])->columns(2)
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('vendor_name'),
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
            'index' => Pages\ListVendors::route('/'),
            'create' => Pages\CreateVendor::route('/create'),
            'edit' => Pages\EditVendor::route('/{record}/edit'),
        ];
    }    
}
