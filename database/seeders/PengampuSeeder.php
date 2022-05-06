<?php

namespace Database\Seeders;

use App\Models\Pengampu;
use Illuminate\Database\Seeder;

class PengampuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Pengampu::create([
            'id_dosen'=>1,
            'id_matakuliah'=>1,
            'penanggung_jawab'=>true,//boolean
            'kelas'=>'A',//A,B,C,D,E
        ]);

        Pengampu::create([
            'id_dosen'=>2,
            'id_matakuliah'=>2,
            'penanggung_jawab'=>true,//boolean
            'kelas'=>'A',//A,B,C,D,E
        ]);

        Pengampu::create([
            'id_dosen'=>3,
            'id_matakuliah'=>2,
            'penanggung_jawab'=>false,//boolean
            'kelas'=>'B',//A,B,C,D,E
        ]);
    }
}
