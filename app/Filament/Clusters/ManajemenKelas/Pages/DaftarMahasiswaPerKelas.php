<?php

namespace App\Filament\Clusters\ManajemenKelas\Pages;

use App\Filament\Clusters\ManajemenKelas;
use App\Models\Kelas;
use App\Models\User;
use Filament\Pages\Page;
use Filament\Forms\Form;
use Filament\Forms;
use Filament\Tables\Table;
use Filament\Tables;
use Filament\Tables\Contracts\HasTable;
use Filament\Forms\Contracts\HasForms;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Forms\Concerns\InteractsWithForms;

class DaftarMahasiswaPerKelas extends Page implements HasForms, HasTable
{
    use InteractsWithForms, InteractsWithTable;

    protected static ?string $navigationIcon = 'heroicon-o-document-text';
    protected static string $view = 'filament.clusters.manajemen-kelas.pages.daftar-mahasiswa-per-kelas';
    protected static ?string $cluster = ManajemenKelas::class;
    protected static ?string $navigationLabel = 'Lihat Mahasiswa per Kelas';

public ?string $selectedKelas = null;

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('selectedKelas')
                    ->label('Pilih Kelas')
                    ->native(false)
                    ->options(Kelas::pluck('nama_kelas', 'id'))
                    ->reactive()
                    ->afterStateUpdated(fn () => $this->resetTable()),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->emptyStateHeading('Belum Memilih Kelas')
            ->query(fn () =>
                $this->selectedKelas
                    ? User::where('kelas_id', $this->selectedKelas)
                    : User::query()->whereRaw('0=1') // kosong saat belum memilih
            )
            ->columns([
                Tables\Columns\TextColumn::make('name')->label('Nama Mahasiswa'),
                Tables\Columns\TextColumn::make('email'),
                
            ]);
            
    }
}
