<?php

namespace App\Filament\Resources\KelasResource\Pages;

use App\Filament\Resources\KelasResource;
use Filament\Resources\Pages\ViewRecord;
use Filament\Infolists\Infolist;
use Filament\Infolists\Components\Section;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Components\RepeatableEntry;
use Illuminate\Database\Eloquent\Model;

class ViewKelas extends ViewRecord
{
    protected static string $resource = KelasResource::class;

        public function getInfolists(): array
        {
            return [
                Infolist::make()
                    ->record($this->record) // ⬅️ INI PENTING!
                    ->schema([
                        Section::make('Detail Kelas')
                            ->schema([
                                TextEntry::make('nama_kelas')->label('Nama Kelas'),
                                TextEntry::make('prodi.nama_prodi')->label('Program Studi'),
                            ]),

                        Section::make('Daftar Mahasiswa')
                            ->schema([
                                RepeatableEntry::make('users')
                                    ->label('Mahasiswa')
                                    ->relationship()
                                    ->schema([
                                        TextEntry::make('name')->label('Nama'),
                                        TextEntry::make('email')->label('Email'),
                                    ])
                                    ->columns(2),
                            ]),
                    ]),
            ];
        }
        protected function resolveRecord(string | int $key): Model
        {
            return static::getResource()::getEloquentQuery()
                ->with(['prodi', 'users']) // relasi yang ingin dimuat
                ->findOrFail($key);
        }


}
