<?php

namespace Database\Seeders;

use App\Models\jurusan;
use Illuminate\Database\Seeder;

class JurusanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $ini=[
            'Ekonomi Syariah',
            'Perbankan Syariah',
            'Akuntansi Syariah',
            'Manajemen Keuangan Syariah'
        ];

        foreach($ini as $i){
            $u=new jurusan;
            $u->nama=$i;
            $u->save();
        }
    }
}
