<?php

namespace App\Filament\Clusters;

use Filament\Clusters\Cluster;

class ManajemenKelas extends Cluster
{
    public static function getLabel(): string
    {
        return 'Manajemen Akademik';
    }
    protected static ?string $navigationIcon = 'heroicon-o-squares-2x2';

    // public static function getIcon(): ?string
    // {
    //     return 'heroicon-o-squares-2x2';
    // }
}
