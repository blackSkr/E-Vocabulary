<?php

namespace App\Filament\Clusters\ManajemenKelas\Resources\Pages;

use App\Filament\Clusters\ManajemenKelas\Resources\KelasResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListKelas extends ListRecords
{
    protected static string $resource = KelasResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()->label('Tambah Kelas'),
        ];
    }
}
