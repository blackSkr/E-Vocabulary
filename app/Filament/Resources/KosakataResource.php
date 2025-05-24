<?php

namespace App\Filament\Resources;

use App\Filament\Resources\KosakataResource\Pages;
use App\Filament\Resources\KosakataResource\RelationManagers;
use App\Models\Kosakata;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class KosakataResource extends Resource
{
    protected static ?string $model = Kosakata::class;
    protected static ?string $pluralModelLabel = "Kosaktata";
    // protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationGroup = "Manajemen Kosakata";

    public static function form(Form $form): Form
    {
        return $form
            ->schema([

                     Forms\Components\Section::make('Informasi Kosakata')
                    ->description('Isi data kosakata dengan lengkap dan benar.')
                    ->schema([
                        Forms\Components\Select::make('jenis_kosakata_id')
                            ->relationship('jenis_kosakata', 'jenis_kosakata')
                            ->label('Jenis Kosakata')
                            ->native(false)
                            ->required(),
                        Forms\Components\TextInput::make('kata_indo')
                            ->label('Kata dalam Bahasa Indonesia')
                            ->required()
                            ->maxLength(255)
                            ->placeholder('Contoh: Makan')
                            ->columnSpanFull(),

                        Forms\Components\TextInput::make('kata_inggris')
                            ->label('Kata dalam Bahasa Inggris')
                            ->required()
                            ->maxLength(255)
                            ->placeholder('Contoh: Eat')
                            ->columnSpanFull(),

                        Forms\Components\TextInput::make('slug')
                            ->label('Slug')
                            ->required()
                            ->maxLength(255)
                            ->placeholder('Contoh: makan')
                            ->helperText('Biasanya diisi dengan versi lowercase dan tanda strip (slug).')
                            ->columnSpanFull(),

                        Forms\Components\FileUpload::make('suara')
                            ->label('Audio Pengucapan')
                            ->acceptedFileTypes(['audio/mpeg', 'audio/wav', 'audio/mp3'])
                            ->directory('kosakata/suara')
                            ->maxSize(2048)
                            ->columnSpanFull(),

                        Forms\Components\Textarea::make('contoh_penerapan')
                            ->label('Contoh Penerapan Kalimat')
                            ->placeholder('Contoh: Saya makan nasi setiap hari.')
                            ->rows(4)
                            ->columnSpanFull(),

                        Forms\Components\FileUpload::make('contoh_gambar')
                            ->label('Gambar Ilustrasi')
                            ->image()
                            ->directory('kosakata/gambar')
                            ->imageEditor()
                            ->maxSize(2048)
                            ->columnSpanFull(),

                        Forms\Components\Select::make('status')
                            ->label('Status')
                            ->required()
                            ->native(false)
                            ->options([
                                'Disetujui' => 'Disetujui',
                                'Ditinjau' => 'Ditinjau',
                                'Ditolak' => 'Ditolak',
                            ])
                            ->columnSpanFull(),
                    ])
                    ->columns(1)
                    ->collapsible(),
            ]);
    }


public static function table(Table $table): Table
{
    return $table
        ->columns([

            Tables\Columns\TextColumn::make('user.name')
                        ->label('Penginput')
                        ->searchable()
                        ->sortable(),
                        // ->toggleable(isToggledHiddenByDefault: true),
            Tables\Columns\TextColumn::make('kata_indo')
                ->label('Indonesia')
                ->searchable()
                ->sortable(),

            Tables\Columns\TextColumn::make('kata_inggris')
                ->label('Inggris')
                ->searchable()
                ->sortable(),

            Tables\Columns\TextColumn::make('slug')
                ->sortable()
                ->toggleable(isToggledHiddenByDefault: true),

            Tables\Columns\ImageColumn::make('contoh_gambar')
                ->label('Gambar')
                ->toggleable(isToggledHiddenByDefault: true),
            Tables\Columns\TextColumn::make('user.name')
                        ->label('Penginput')
                        ->searchable()
                        ->sortable(),
                        // ->toggleable(isToggledHiddenByDefault: false),
            Tables\Columns\TextColumn::make('status')
                ->badge()
                ->color(fn (string $state): string => match ($state) {
                    'Disetujui' => 'info',
                    'Ditinjau' => 'success',
                    'Ditolak' => 'danger',
                }),
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
            Tables\Actions\ViewAction::make(),
            Tables\Actions\EditAction::make(),
            Tables\Actions\DeleteAction::make(),
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
            'index' => Pages\ListKosakatas::route('/'),
            'create' => Pages\CreateKosakata::route('/create'),
            'edit' => Pages\EditKosakata::route('/{record}/edit'),
        ];
    }
}
