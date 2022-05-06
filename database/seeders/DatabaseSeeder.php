<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call(JurusanSeeder::class);
        $this->call(DosenSeeder::class);
        $this->call(MahasiswaSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(MatakuliahSeeder::class);
        $this->call(HariSeeder::class);
        $this->call(RuanganSeeder::class);
        $this->call(PengampuSeeder::class);
        $this->call(SlotJamSeeder::class);
        $this->call(SlotJadwalSeeder::class);
    }
}
