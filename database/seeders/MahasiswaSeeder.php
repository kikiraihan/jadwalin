<?php

namespace Database\Seeders;

use App\Models\Mahasiswa;
use Illuminate\Database\Seeder;

use Faker\Factory as Faker;

class MahasiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');
        for ($i=0; $i < 10; $i++) { 
            $m= new Mahasiswa;
            $m->nama=$faker->name;
            $m->nim='00'.$i;
            $m->id_jurusan=1;
            $m->save();
        }
    }
}
