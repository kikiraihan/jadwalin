<?php

namespace App\Http\Livewire;

use App\Exports\slotJadwalExport;
use App\Models\Hari;
use App\Models\slotjadwal;
use Livewire\Component;
use App\Models\slotjam;
use Carbon\Carbon;
use Livewire\WithPagination;
use Maatwebsite\Excel\Facades\Excel;

class SlotJadwalIndex extends Component
{   
    use WithPagination;

    protected $listeners=[
        'FixHapusJadwal'=>'hapusJadwal',
        'FixHapusSemuaJadwal'=>'hapusSemuaJadwal',
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

    public function hapusSemuaJadwal()
    {
        foreach (slotjadwal::all() as $value) {
            $value->delete();
        };
        $this->emit('swalDeleted');
    }


    public function generateJadwal()
    {
        //
    }

    public function downloadExcell() 
    {
        $waktu=Carbon::now();

        return Excel::download(new slotJadwalExport($this->filterIdHari), 'jadwal_export_'.$waktu->format('Y_M_d').'.xlsx');
    }
}
