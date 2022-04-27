<?php

namespace Database\Seeders;

use App\Models\Dosen;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class DosenSeeder extends Seeder
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
            $m= new Dosen;
            $m->nama=$faker->name;
            $m->nip='23188219'.$i;
            $m->jurusan="bahasa inggris";
            $m->save();
        }
    }
}
