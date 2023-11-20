<?php

namespace App\Filament\Resources\W9SubmissionResource\Pages;

use App\Filament\Resources\W9SubmissionResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditW9Submission extends EditRecord
{
    protected static string $resource = W9SubmissionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
