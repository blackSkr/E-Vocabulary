<?php

namespace App\Filament\Resources\KosakataResource\Pages;

use App\Filament\Resources\KosakataResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Facades\Auth;


class CreateKosakata extends CreateRecord
{
    protected static string $resource = KosakataResource::class;
    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['user_id'] = Auth::id(); // set user_id ke user yang sedang login
        return $data;
    }
}
