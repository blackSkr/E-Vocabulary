<?php

namespace App\Filament\Widgets;

use App\Models\Kosakata;
use Filament\Widgets\Widget;

class KosakataNotification extends Widget
{
    protected static string $view = 'filament.widgets.kosakata-notification';
    protected static bool $isLazy = false;
    protected static ?string $pollingInterval = '10s'; // auto-refresh

    protected static ?int $sort = -1;

    protected function getViewData(): array
    {
        return [
            'kosakataBaru' => Kosakata::where('status', 'Ditinjau')->latest()->take(5)->get(),
        ];
    }

    public static function canView(): bool
    {
        return auth()->user()->hasRole('super_admin'); // opsional
    }
}
