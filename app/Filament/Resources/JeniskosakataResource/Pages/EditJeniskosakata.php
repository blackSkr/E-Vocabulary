<?php

namespace App\Filament\Resources\JeniskosakataResource\Pages;

use App\Filament\Resources\JeniskosakataResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditJeniskosakata extends EditRecord
{
    protected static string $resource = JeniskosakataResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
