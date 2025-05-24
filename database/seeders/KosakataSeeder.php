<?php

namespace Database\Seeders;

use App\Models\Kosakata;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class KosakataSeeder extends Seeder
{
    public function run(): void
    {
        $userIds = [
            '01jvva0d6ywbkez5axp29m6z7x',
            '01jvva1j1dzdqjfktbdmy1dkap',
            '01jvva0b8a6vfnrn8an7ba9rar',
            '01jvva0bjw8785m4cevymhxsst',
            '01jvva0bysw9qerb7j2btxbegd',
            '01jvva0c9qp3hmjtnfjeg4136e',
            '01jvva0cm62hxk7exe3vqp9ddv',
        ];

        $jenisIds = [
            '01jvva0cmb35m5mesta9qcmf1q', // Structures
            '01jvva0cmdedcve1kx3vs7yrmw', // Materials
            '01jvva0cmfgq88b5kc7jaekcgp', // Geotechnics
            '01jvva0cmhhd8j0v0qdgknhy7c', // Hydraulics
            '01jvva0cmk30vrv9wpspgh5wx2', // Transportation
            '01jvva0cmnzgp1tpeymb378thk', // Construction Management
            '01jvva0cmqwmzw0bvyw1p0ast8', // Surveying
            '01jvva0cmsz8nt0bzw952gb075', // Environmental Engineering
            '01jvva0cmvmwp7gbe4x8eykhxc', // Project Planning
            '01jvva0cmxbk5ya9pgbmm5sdtq', // Soil Mechanics
        ];

        $terms = [
            ["Palu", "Hammer"], ["Jackhammer", "Jackhammer"], ["Excavator", "Excavator"], 
            ["Bulldozer", "Bulldozer"], ["Cangkul", "Hoe"], ["Beton Molen", "Concrete Mixer"],
            ["Pemadat Tanah", "Soil Compactor"], ["Kompresor Udara", "Air Compressor"],
            ["Tower Crane", "Tower Crane"], ["Alat Theodolit", "Theodolite"], 
            ["Survey GPS", "GPS Survey"], ["Semen Portland", "Portland Cement"],
            ["Kawat Baja", "Steel Wire"], ["Tangki Air", "Water Tank"], ["Pipa PVC", "PVC Pipe"],
            ["Saringan Agregat", "Aggregate Sieve"], ["Gerinda", "Grinder"],
            ["Bor Beton", "Concrete Drill"], ["Pengaduk Semen", "Cement Mixer"],
            ["Penebal Jalan", "Road Compactor"], ["Bar Cutter", "Bar Cutter"],
            ["Bar Bender", "Bar Bender"], ["Laser Level", "Laser Level"],
            ["Total Station", "Total Station"], ["Sump Pump", "Sump Pump"]
        ];

        for ($i = 0; $i < 100; $i++) {
            $term = $terms[$i % count($terms)];
            $kataIndo = $term[0];
            $kataInggris = $term[1];
            $slug = Str::slug($kataInggris) . '-' . $i;

            Kosakata::create([
                'user_id' => $userIds[array_rand($userIds)],
                'jenis_kosakata_id' => $jenisIds[array_rand($jenisIds)],
                'kata_indo' => $kataIndo,
                'kata_inggris' => $kataInggris,
                'slug' => $slug,
                'suara' => null,
                'contoh_penerapan' => "Contoh penerapan dari '{$kataIndo}' dalam proyek konstruksi nyata.",
                'contoh_gambar' => "https://source.unsplash.com/500x400/?civil,engineering,construction&sig={$i}",
                'status' => 'Disetujui',
            ]);
        }
    }
}
