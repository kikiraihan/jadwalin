<?php

namespace Database\Seeders;

use App\Models\Ruangan;
use Illuminate\Database\Seeder;

class RuanganSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Ruangan::create([
            'nama'=>'R.1.1 Imam Syafi\'i',
            'kapasitas'=>'20',
            'kategori'=>'teori',
        ]);

        Ruangan::create([
            'nama'=>'R.1.2 Imam Malik',
            'kapasitas'=>'20',
            'kategori'=>'teori',
        ]);


        Ruangan::create([
            'nama'=>'Lab Falak',
            'kapasitas'=>'20',
            'kategori'=>'praktek',
        ]);
    }
}
