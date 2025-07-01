<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Mahasiswa;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Mahasiswa::create([
            'nama' => 'Aridwan',
            'nim' => 22552011189,
            'kelas' => 'TIF 22 CID'
        ]);
        Mahasiswa::factory(9)->create();
    }
}
