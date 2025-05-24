<?php

namespace App\Filament\Resources\JeniskosakataResource\Pages;

use App\Filament\Resources\JeniskosakataResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListJeniskosakatas extends ListRecords
{
    protected static string $resource = JeniskosakataResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
                ->label('Tambah Jenis Kosakata'),
        ];
    }
}
