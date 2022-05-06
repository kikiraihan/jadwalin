<?php

namespace Database\Seeders;

use App\Models\slotjadwal;
use Illuminate\Database\Seeder;

class SlotjadwalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        slotjadwal::create([
            'id_slot_jam'=>1,
            'id_ruangan'=>1,
            'id_pengampu'=>1,
        ]);

        slotjadwal::create([
            'id_slot_jam'=>1,
            'id_ruangan'=>1,
            'id_pengampu'=>2,
        ]);
    }
}
