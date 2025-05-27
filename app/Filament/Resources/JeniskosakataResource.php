<?php

namespace App\Filament\Resources;

use App\Filament\Resources\JeniskosakataResource\Pages;
use App\Filament\Resources\JeniskosakataResource\RelationManagers;
use App\Models\Jeniskosakata;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class JeniskosakataResource extends Resource
{
    protected static ?string $model = Jeniskosakata::class;
    protected static ?string $pluralModelLabel = "Jenis Kosakata";
    // protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationGroup = "Manajemen Kosakata";

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
                Forms\Components\TextInput::make('jenis_kosakata')
                    ->label('Jenis Kosakata')
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
                Tables\Columns\TextColumn::make('jenis_kosakata')
                    ->label('Jenis Kosakata')
            ])
            ->filters([
                //
            ])
            ->emptyStateHeading('Tidak Ada Jenis Kosakata')
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
            'index' => Pages\ListJeniskosakatas::route('/'),
            'create' => Pages\CreateJeniskosakata::route('/create'),
            'edit' => Pages\EditJeniskosakata::route('/{record}/edit'),
        ];
    }
}
