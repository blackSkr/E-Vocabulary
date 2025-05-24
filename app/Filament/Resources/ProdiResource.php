<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProdiResource\Pages;
use App\Filament\Resources\ProdiResource\RelationManagers;
use App\Models\Prodi;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ProdiResource extends Resource
{
    protected static ?string $model = Prodi::class;
    protected static ?string $pluralModelLabel = "Program Studi";

    // protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationGroup = "Manajemen Data";

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
                Forms\Components\TextInput::make('nama_prodi')
                    ->label('Nama Program Studi')
                    ->required()
                    ->maxLength(40),
                Forms\Components\Select::make('jurusan_id')
                    ->relationship('jurusan', 'nama_jurusan')
                    ->label('Jurusan')
                    ->preload()
                    ->required()
                    ->native(false),
                Forms\Components\Select::make('status')
                    ->options([
                        'Aktif' => 'Aktif',
                        'Tidak Aktif' => 'Tidak Aktif',
                    ])
                    ->native(false)
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
                Tables\Columns\TextColumn::make('nama_prodi')
                    ->label('Nama Program Studi')
                    ->searchable(),
                    
                Tables\Columns\TextColumn::make('jurusan.nama_jurusan')
                    ->label('Nama Jurusan')
                    ->searchable(),
                Tables\Columns\TextColumn::make('status')
                    ->label('Status')
                    ->searchable(),

            ])
            ->filters([
                //
            ])
            ->emptyStateHeading('Tidak Ada Program Studi')
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
            'index' => Pages\ListProdis::route('/'),
            'create' => Pages\CreateProdi::route('/create'),
            'edit' => Pages\EditProdi::route('/{record}/edit'),
        ];
    }
}
