<?php

namespace App\Http\Livewire;

use App\Models\Hari;
use App\Models\slotjadwal;
use Livewire\Component;
use App\Models\slotjam;
use Livewire\WithPagination;

class SlotJadwalIndex extends Component
{   
    use WithPagination;

    protected $listeners=[
        'FixHapusJadwal'=>'hapusJadwal',
        'FixGenerateJadwal'=>'generateJadwal',
    ];

    // untuk pencarian
    public $filterIdHari=null;

    public function render()
    {
        $table=slotjam::with(['hari','slotJadwal.pengampu.matakuliah','slotJadwal.pengampu.dosen', 'slotJadwal.ruangan'])
        ->orderBy('id_hari','asc')
        ->orderBy('awal','asc')
        ;
        if($this->filterIdHari) $table->where('id_hari', $this->filterIdHari);

        return view('livewire.slot-jadwal-index',[
            'isiTabel'=>$table->get()->groupBy('id_hari'),
            'hari'=>Hari::all(),
        ]);
    }



    public function hapusJadwal($id)
    {
        slotjadwal::find($id)->delete();
        $this->emit('swalDeleted');
    }

    public function generateJadwal()
    {
        //
    }
}
