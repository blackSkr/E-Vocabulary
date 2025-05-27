<?php

namespace App\Filament\Resources;

use App\Filament\Resources\LaporanResource\Pages;
use App\Filament\Resources\LaporanResource\RelationManagers;
use App\Models\Laporan;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Illuminate\Support\Facades\Date;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;
class LaporanResource extends Resource
{
    protected static ?string $model = Laporan::class;

    // protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $pluralModelLabel = "Laporan";
    protected static ?string $navigationGroup = "Manajemen Pengguna";


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nama_pelapor')
                    ->label('Nama Pelapor')
                    ->disabled(),
                
                Forms\Components\TextInput::make('email_pelapor')
                    ->label('Email')
                    ->disabled(),

                Forms\Components\TextInput::make('no_hp')
                    ->label('Nomor HP')
                    ->disabled(),

                Forms\Components\FileUpload::make('bukti_laporan')
                    ->label('Bukti')
                    ->columnSpanFull()
                    ->disabled(),

                Forms\Components\Hidden::make('tanggal_selesai')
                    ->label('Selesai Ditinjau')
                    ->dehydrated(),

                Select::make('status')
                    ->columnSpanFull()
                    ->label('Status Laporan')
                    ->native(false)
                    ->options([
                        'Menunggu' => 'Menunggu',
                        'Sedang Ditinjau' => 'Sedang Ditinjau',
                        'Sudah Ditinjau' => 'Sudah Ditinjau',
                    ])
                    ->required()
                    ->reactive()
                    ->afterStateUpdated(function ($state, callable $set) {
                        if ($state === 'Sudah Ditinjau') {
                            $set('tanggal_selesai', now());
                        } else {
                            $set('tanggal_selesai', null);
                        }
                    }),
            ]);
    }


    public static function table(Table $table): Table
    {
        return $table
        ->columns([
            TextColumn::make('nama_pelapor')
                ->label('Nama Pelapor')
                ->searchable()
                ->sortable(),

            TextColumn::make('email_pelapor')
                ->label('Email')
                ->searchable(),

            TextColumn::make('no_hp')
                ->label('Nomor HP')
                ->searchable(),

            ImageColumn::make('bukti_laporan')
                ->label('Bukti'),

            TextColumn::make('tanggal_selesai')
                ->label('Selesai Ditinjau')
                ->dateTime('d M Y, H:i')
                ->sortable(),

            TextColumn::make('status')
                ->label('Status Laporan')
                ->badge()
                ->colors([
                    'primary' => 'Menunggu',
                    'warning' => 'Sedang Ditinjau',
                    'success' => 'Sudah Ditinjau',
                ])
                ->sortable(),
        ])
            ->filters([
                //
            ])
            ->emptyStateHeading('Tidak Ada Laporan')
            ->actions([
                Tables\Actions\ActionGroup::make([
                    Tables\Actions\ViewAction::make()
                    ->label('Detail'),
                    Tables\Actions\EditAction::make()
                    ->label('Edit'),
                    Tables\Actions\DeleteAction::make()
                    ->label('Hapus'),
                ])
                ->icon('heroicon-m-ellipsis-horizontal'),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListLaporans::route('/'),
            'create' => Pages\CreateLaporan::route('/create'),
            'edit' => Pages\EditLaporan::route('/{record}/edit'),
        ];
    }
}
