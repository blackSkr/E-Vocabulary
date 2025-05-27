<?php

namespace App\Filament\Widgets;

use App\Models\Kosakata;
use Carbon\Carbon;
use Filament\Widgets\Concerns\InteractsWithPageFilters;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverviewWidget extends BaseWidget
{
    use InteractsWithPageFilters;

    protected static ?int $sort = 0;

    protected function getStats(): array
    {
        $startDate = ! is_null($this->filters['startDate'] ?? null)
            ? Carbon::parse($this->filters['startDate'])
            : null;

        $endDate = ! is_null($this->filters['endDate'] ?? null)
            ? Carbon::parse($this->filters['endDate'])
            : now();

        $jenisKosakataId = $this->filters['jenis_kosakata_id'] ?? null;

        $query = Kosakata::query()
            ->when($jenisKosakataId, fn ($q) => $q->where('jenis_kosakata_id', $jenisKosakataId));

        $totalKosakata = $query->count();

        $newKosakata = (clone $query)->when($startDate, function ($query) use ($startDate, $endDate) {
            $query->whereBetween('created_at', [$startDate, $endDate]);
        })->count();

        $approvedKosakata = (clone $query)->where('status', 'Disetujui')->count();
        $kosakataDitolak = (clone $query)->where('status', 'Ditolak')->count();
        return [
            Stat::make('Total Kosakata', $totalKosakata)
                ->description('Jumlah total entri kosakata')
                ->descriptionIcon('heroicon-m-book-open')
                ->chart([2, 4, 5, 7, 10, 12, 15])
                ->color('primary'),

            Stat::make('Kosakata Baru', $newKosakata)
                ->description('Ditambahkan baru-baru ini')
                ->descriptionIcon('heroicon-m-plus-circle')
                ->chart([1, 2, 3, 6, 8, 5, 9])
                ->color('success'),

            Stat::make('Kosakata Disetujui', $approvedKosakata)
                ->description('Dengan status Disetujui')
                ->descriptionIcon('heroicon-m-check-circle')
                ->chart([2, 3, 6, 7, 6, 8, 10])
                ->color('info'),
            Stat::make('Kosakata Ditolak', $kosakataDitolak)
                ->description('Dengan status Ditolak')
                ->descriptionIcon('heroicon-m-x-mark')
                ->chart([2, 3, 6, 7, 6, 8, 10])
                ->color('danger'),
        ];
    }
}
