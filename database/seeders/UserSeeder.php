<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $users = [
            [
                'nim' => 220101001,
                'name' => 'Ahmad Fauzan',
                'email' => 'ahmad@example.com',
                'no_hp' => '081234567001',
            ],
            [
                'nim' => 220101002,
                'name' => 'Putri Lestari',
                'email' => 'putri@example.com',
                'no_hp' => '081234567002',
            ],
            [
                'nim' => 220101003,
                'name' => 'Bagus Pratama',
                'email' => 'bagus@example.com',
                'no_hp' => '081234567003',
            ],
            [
                'nim' => 220101004,
                'name' => 'Dewi Kartika',
                'email' => 'dewi@example.com',
                'no_hp' => '081234567004',
            ],
            [
                'nim' => 220101005,
                'name' => 'Rizky Hidayat',
                'email' => 'rizky@example.com',
                'no_hp' => '081234567005',
            ],
        ];

        foreach ($users as $user) {
            User::create([
                'nim' => $user['nim'],
                'name' => $user['name'],
                'email' => $user['email'],
                'no_hp' => $user['no_hp'],
                'password' => Hash::make('password123'),
                'prodi_id' => null,
                'kelas_id' => null,
                'foto_profil' => null,
                'total_kontribusi' => '0',
                'email_verified_at' => now(),
                'remember_token' => Str::random(10),
            ]);
        }
    }
}
