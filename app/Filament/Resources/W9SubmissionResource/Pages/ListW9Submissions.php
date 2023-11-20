<?php

namespace App\Filament\Resources\W9SubmissionResource\Pages;

use App\Filament\Resources\W9SubmissionResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListW9Submissions extends ListRecords
{
    protected static string $resource = W9SubmissionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
