<?php

namespace App\Filament\Clusters\ManajemenKelas\Resources;

use App\Filament\Clusters\ManajemenKelas\Resources\Pages;
use App\Filament\Resources\KelasResource\RelationManagers;
use App\Models\Kelas;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Tables\Actions\ActionGroup;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\ViewAction;

class KelasResource extends Resource
{
    protected static ?string $model = Kelas::class;
    protected static ?string $cluster = \App\Filament\Clusters\ManajemenKelas::class;

    // protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    // protected static ?string $navigationGroup = "Manajemen Data";
    protected static ?string $navigationIcon = 'heroicon-o-bolt';

    protected static ?string $pluralModelLabel = "Kelas"; 
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
                Forms\Components\TextInput::make('nama_kelas')
                    ->label('Nama Kelas')
                    ->required()
                    ->maxLength(30),
                Forms\Components\Select::make('prodi_id')
                    ->relationship('prodi', 'nama_prodi')
                    ->label('Program Studi')
                    ->native(false)
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
                Tables\Columns\TextColumn::make('nama_kelas')
                    ->label('Nama Kelas')
                    ->searchable(),
                Tables\Columns\TextColumn::make('prodi.nama_prodi',)
                    ->label('Nama Program Studi')
                    ->sortable(),
                Tables\Columns\TextColumn::make('users.name') // ini khusus
                    ->label('Mahasiswa')
                    ->searchable()
                    ->listWithLineBreaks() 
                    ->limitList(5) 
                    ->bulleted(), 



            ])
            ->filters([
                //
            ])
            ->emptyStateHeading('Kelasnya Kosong Nih')
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
            'index' => Pages\ListKelas::route('/'),
            'create' => Pages\CreateKelas::route('/create'),
            // 'edit' => Pages\EditKelas::route('/{record}/edit'),
            'view' => Pages\ViewKelas::route('/{record}'), 
        ];
    }
}
