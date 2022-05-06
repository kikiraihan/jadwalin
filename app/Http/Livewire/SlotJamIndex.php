<?php

namespace App\Http\Livewire;

use App\Models\Hari;
use App\Models\slotjam;
use Livewire\Component;
use Livewire\WithPagination;

class SlotJamIndex extends Component
{
    use WithPagination;

    protected $listeners=[
        'FixHapusSlotJam'=>'hapus',
        'FixResetDefaultConfig'=>'toDefaultConfig',
    ];

    // untuk pencarian
    public $filterIdHari=null;

    public function render()
    {
        $table=slotjam::with(['hari'])
        ->orderBy('id_hari','asc')
        ->orderBy('awal','asc')
        ;
        if($this->filterIdHari) $table->where('id_hari', $this->filterIdHari);

        return view('livewire.slot-jam-index',[
            'isiTabel'=>$table->paginate(60),
            'hari'=>Hari::all(),
        ]);
    }

    public function hapus($id)
    {
        slotjam::find($id)->delete();
        $this->emit('swalDeleted');
    }

    public function toDefaultConfig()
    {
        foreach (slotjam::all() as $ini) $ini->delete();

        $slot=[
            ['07:30','09:10','2'],
            ['09:20','11:00','2'],
            ['11:20','13:00','2'],
            ['13:20','15:00','2'],
            ['15:30','17:10','2'],

            ['07:30','10:00','3'],
            ['10:10','12:40','3'],
            ['13:00','15:30','3'],
        ];

        $slotJumat=[
            ['07:30','09:10','2'],
            ['09:20','11:00','2'],
            ['13:20','15:00','2'],
            ['15:30','17:10','2'],

            ['08:00','10:30','3'],
            ['13:00','15:30','3'],
        ];

        foreach(Hari::all() as $hari)
        {
            if ($hari->nama!='jumat') {
                foreach($slot as $jam)
                {
                    slotjam::create([
                        'id_hari'=>$hari->id,
                        'awal'=>$jam[0],
                        'akhir'=>$jam[1],
                        'sks'=>$jam[2],
                    ]);
                }
            }
            else
            {
                foreach($slotJumat as $jam)
                {
                    slotjam::create([
                        'id_hari'=>$hari->id,
                        'awal'=>$jam[0],
                        'akhir'=>$jam[1],
                        'sks'=>$jam[2],
                    ]);
                }
            }
        }
    }
}
