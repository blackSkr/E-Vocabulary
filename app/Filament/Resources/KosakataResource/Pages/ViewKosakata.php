<?php

namespace App\Filament\Resources\KosakataResource\Pages;

use Filament\Resources\Pages\ViewRecord\Concerns\InteractsWithRecordInfolists;
use Filament\Resources\Pages\ViewRecord;
use App\Filament\Resources\KosakataResource;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\Section;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Components\HtmlEntry;

class ViewKosakata extends ViewRecord
{
    protected static string $resource = KosakataResource::class;


    public function getInfolistSchema(): array
    {
        return [
            Section::make('Detail Kosakata')
                ->schema([
                    TextEntry::make('kata_indo')->label('Kata dalam Bahasa Indonesia'),
                    TextEntry::make('kata_inggris')->label('Kata dalam Bahasa Inggris'),
                    TextEntry::make('slug')->label('Slug'),
                    TextEntry::make('contoh_penerapan')->label('Contoh Penerapan Kalimat'),
                    TextEntry::make('status')->label('Status'),
                    HtmlEntry::make('gambar')
                        ->label('Gambar Ilustrasi')
                        ->html(fn ($record) => '<img src="' . asset('public/storage/' . $record->contoh_gambar) . '" class="rounded shadow-md w-64" />'),
                ]),
        ];
    }

}
