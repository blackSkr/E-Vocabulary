<?php

namespace Database\Seeders;

use App\Models\Jeniskosakata;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JenisKosakataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
                $kategori = [
            'Structures',
            'Materials',
            'Geotechnics',
            'Hydraulics',
            'Transportation',
            'Construction Management',
            'Surveying',
            'Environmental Engineering',
            'Project Planning',
            'Soil Mechanics',
        ];

        foreach ($kategori as $jenis) {
            Jeniskosakata::create([
                'jenis_kosakata' => $jenis
            ]);
        }
    }
}
