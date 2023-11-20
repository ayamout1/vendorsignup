<?php

namespace App\Filament\Resources\AgreementFormResource\Pages;

use App\Filament\Resources\AgreementFormResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditAgreementForm extends EditRecord
{
    protected static string $resource = AgreementFormResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
