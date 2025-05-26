<?php

namespace App\Filament\Pages;

use App\Filament\Widgets\KosakataNotification;
use App\Filament\Widgets\TopContributorsWidget;
use App\Models\Jeniskosakata;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Pages\Dashboard as BaseDashboard;

class Dashboard extends BaseDashboard
{
    use BaseDashboard\Concerns\HasFiltersForm;

    public function filtersForm(Form $form): Form
    {
        return $form
            ->schema([
                Section::make()
                    ->schema([
                        Select::make('jenis_kosakata_id')
                            ->label('Jenis Kosakata')
                            ->options(fn () => Jeniskosakata::pluck('jenis_kosakata', 'id'))
                            ->searchable()
                            ->preload()
                            ->required(),

                        DatePicker::make('startDate')
                            ->label('Tanggal Mulai')
                            ->maxDate(fn (Get $get) => $get('endDate') ?: now()),

                        DatePicker::make('endDate')
                            ->label('Tanggal Akhir')
                            ->minDate(fn (Get $get) => $get('startDate') ?: now())
                            ->maxDate(now()),
                    ])
                    ->columns(3),
            ]);
        }
    public function getWidgets(): array
    {
        return [
            \App\Filament\Widgets\StatsOverviewWidget::class,
            TopContributorsWidget::class,
        ];
    }
        

}
