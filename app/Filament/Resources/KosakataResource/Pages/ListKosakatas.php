<?php

namespace App\Filament\Resources\KosakataResource\Pages;

use App\Filament\Resources\KosakataResource;
use Filament\Actions;
use Filament\Resources\Components\Tab;
use Filament\Resources\Pages\ListRecords;

class ListKosakatas extends ListRecords
{
    protected static string $resource = KosakataResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
                ->label('Tambah Kosakata'),
        ];
        
    }
        public function getTabs(): array
        {
            return [
                null => Tab::make('All'),
                // 'new' => Tab::make()->query(fn ($query) => $query->where('status', 'new')),
                'Disetujui' => Tab::make()->query(fn ($query) => $query->where('status', 'Disetujui')),
                'Ditinjau' => Tab::make()->query(fn ($query) => $query->where('status', 'Ditinjau')),
                'Ditolak' => Tab::make()->query(fn ($query) => $query->where('status', 'Ditolak')),
                // 'cancelled' => Tab::make()->query(fn ($query) => $query->where('status', 'cancelled')),
            ];
        }
}
