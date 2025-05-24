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
$topUsers = User::with('prodi')
    ->withCount('kosakatas') // hitung relasi kosakata
    ->orderByDesc('kosakatas_count')
    ->take(5)
    ->get()
    ->map(function ($user) {
        return [
            'id' => $user->id,
            'name' => $user->name ?? 'Tidak diketahui',
            'total' => $user->kosakatas_count,
            'nim' => $user->nim ?? 'Tidak ada NIM',
            'prodi' => $user->prodi->nama_prodi ?? 'Tidak Memiliki Program Studi',
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
