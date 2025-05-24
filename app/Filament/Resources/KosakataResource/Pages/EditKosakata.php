<?php

namespace App\Filament\Resources\KosakataResource\Pages;

use App\Filament\Resources\KosakataResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditKosakata extends EditRecord
{
    protected static string $resource = KosakataResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
