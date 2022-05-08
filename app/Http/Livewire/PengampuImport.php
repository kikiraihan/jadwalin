<?php

namespace App\Http\Livewire;

use App\Exports\templatePengampuExport;
use App\Models\jurusan;
use Carbon\Carbon;
use Livewire\Component;
use Maatwebsite\Excel\Facades\Excel;

class PengampuImport extends Component
{
    public $filterIdJurusan;
    public $filterSemester;

    public function mount()
    {
        $this->filterIdJurusan = 1;
        $this->filterSemester = 1;
    }

    public function render()
    {
        return view('livewire.pengampu-import',[
            'jurusan'=>jurusan::all(),
            'judul_file'=>jurusan::find($this->filterIdJurusan)->nama.'-semester '.$this->filterSemester, 
        ]);
    }

    public function downloadTemplate()
    {
        $waktu=Carbon::now();

        return Excel::download(new templatePengampuExport($this->filterIdJurusan,$this->filterSemester), 'jadwal_export_'.$waktu->format('Y_M_d').'.xlsx');   
    }
}
