<?php

namespace Database\Seeders;

use App\Models\Hari;
use Illuminate\Database\Seeder;

class HariSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach([
            'Senin',
            'Selasa',
            'Rabu',
            'Kamis',
            'Jumat',
            // 'Sabtu',
        ] as $item)
        Hari::create(['nama'=>$item]);
    }
}
