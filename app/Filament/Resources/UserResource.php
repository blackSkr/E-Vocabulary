<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Filament\Resources\UserResource\RelationManagers;
use App\Models\Kelas;
use App\Models\Prodi;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Set;
use Filament\Tables\Columns\TextColumn;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    // protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationGroup = "Manajemen Pengguna";
    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()->with('kosakatas');
    }


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
                Forms\Components\TextInput::make('nim')
                    ->label('Masukkan NIM')
                    ->required()
                    ->maxLength(115),
                Forms\Components\TextInput::make('name')
                    ->label('Masukkan Nama')
                    ->required()
                    ->maxLength(50),
                Forms\Components\TextInput::make('email')
                    ->label('Masukkan Email')
                    ->required()
                    ->email()
                    ->maxLength(50),
                Forms\Components\TextInput::make('no_hp')
                    ->label('No Handphone')
                    ->required()
                    ->numeric()
                    ->maxLength(13),
            Forms\Components\Select::make('prodi_id')
                ->label('Prodi')
                // ->relationship('prodi', 'nama_prodi')
                ->options(Prodi::all()->pluck('nama_prodi', 'id'))
                ->disabled()
                ->dehydrated()
                ->required(),
            Forms\Components\Select::make('kelas_id')
                ->label("Pilih Kelas")
                ->relationship('kelas', 'nama_kelas')
                ->required()
                ->native(false)
                ->reactive()
                ->afterStateUpdated(function ($state, Set $set) {
                    // Ambil data prodi dari kelas yang dipilih
                    $kelas = Kelas::find($state);
                    if ($kelas) {
                        $set('prodi_id', $kelas->prodi_id);
                    } else {
                        $set('prodi_id', null);
                    }
                }),
            Forms\Components\Select::make('roles')
                ->multiple()
                ->preload()
                ->relationship('roles', 'name'),
            ]);
    }

public static function table(Table $table): Table
{
    return $table
        ->columns([
            Tables\Columns\TextColumn::make('nim')
                ->label('NIM')
                ->searchable()
                ->sortable()
                ->weight('bold'),

            Tables\Columns\TextColumn::make('name')
                ->label('Nama')
                ->searchable()
                ->sortable()
                ->limit(25),

            Tables\Columns\TextColumn::make('email')
                ->label('Email')
                ->color('gray')
                ->searchable()
                ->limit(30)
                ->copyable()
                ->toggleable(isToggledHiddenByDefault: true),


            Tables\Columns\TextColumn::make('no_hp')
                ->label('No HP')
                ->sortable()
                ->color('success')
                ->toggleable(isToggledHiddenByDefault: true),

            Tables\Columns\TextColumn::make('kelas.nama_kelas')
                ->label('Kelas')
                ->badge()
                ->color('info')
                ->sortable(),

            Tables\Columns\TextColumn::make('prodi.nama_prodi')
                ->label('Prodi')
                ->badge()
                ->color('warning')
                ->sortable()
                ->toggleable(isToggledHiddenByDefault: false),
            Tables\Columns\TextColumn::make('jumlah_kosakata')
                ->label('Jumlah Kosakata')
                ->getStateUsing(fn ($record) => $record->kosakatas()->count())
                ->sortable()
                ->badge()
                ->color('info'),
            Tables\Columns\TextColumn::make('kosakata_indo')
                ->label('Kosakata Indo')
                ->getStateUsing(function ($record) {
                    return $record->kosakatas->pluck('kata_indo')->map(fn($item) => '• '.$item)->implode("<br>");
                })
                ->html() 
                ->wrap()
                ->listWithLineBreaks()
                ->toggleable(isToggledHiddenByDefault: true),
            Tables\Columns\TextColumn::make('kosakata_inggris')
                ->label('Kosakata Inggris')
                ->getStateUsing(function ($record) {
                    return $record->kosakatas
                        ->pluck('kata_inggris')
                        ->map(fn($item) => '• ' . e($item))
                        ->implode('<br>');
                })
                ->html()
                ->wrap()
                ->toggleable(isToggledHiddenByDefault: true),
            Tables\Columns\TextColumn::make('roles.name')
                    ->label('Roles')
                    ->badge()
                    ->searchable()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),


        ])
        // ->filters([
        //     Tables\Filters\SelectFilter::make('status')
        //         ->options([
        //             'Disetujui' => 'Disetujui',
        //             'Ditinjau' => 'Ditinjau',
        //             'Ditolak' => 'Ditolak',
        //         ]),
        // ])
        ->actions([
            Tables\Actions\EditAction::make(),
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
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }
}
