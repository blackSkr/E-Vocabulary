<?php

namespace App\Filament\Widgets;

use App\Models\User;
use App\Models\Kosakata;
use Filament\Widgets\Widget;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class TopContributorsWidget extends Widget
{
    protected static string $view = 'filament.widgets.top-contributors-widget';

    protected function getViewData(): array
    {
        // Ambil 5 user teratas berdasarkan jumlah kosakata
        $topUsers = Kosakata::select('user_id', DB::raw('count(*) as total'))
            ->groupBy('user_id')
            ->orderByDesc('total')
            ->with('user') // Eager load relasi user
            ->take(5)
            ->get()
            ->map(function ($item) {
                return [
                    'id' => $item->user->id,
                    'name' => $item->user?->name ?? 'Tidak diketahui',
                    'total' => $item->total,
                    'nim' => $item->user->nim ?? 'Tidak ada NIM',
                ];
            });

        return [
            'topUsers' => $topUsers,
        ];
    }
    public function getColumnSpan(): int|string {
        return 'full';
    }
}
