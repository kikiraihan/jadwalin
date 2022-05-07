<?php

namespace App\Http\Livewire;

use App\Models\jurusan;
use App\Models\Pengampu;
use App\Models\slotjadwal;
use Livewire\Component;
use Livewire\WithPagination;

class PengampuIndex extends Component
{
    use WithPagination;

    protected $listeners=[
        'FixHapusPengampu'=>'hapus',
        'FixHapusJadwal'=>'hapusJadwal',
        'FixHapusSemuaPengampu'=>'hapusSemuaPengampu',
    ];

    // untuk pencarian
    public $search;
    public $filterIdJurusan;

    public function render()
    {
        $pe=Pengampu::with(['matakuliah.jurusan','dosen','slotJadwal.slotjam.hari'])
        ->whereHas('matakuliah', function($q) {
            $q->where('nama', 'like', '%'.$this->search.'%');
        });
        if($this->filterIdJurusan) 
        {
            $pe->whereHas('matakuliah', function($q) {
                $q->where('id_jurusan', $this->filterIdJurusan);
            });
        };
        // $pe->join('matakuliahs', 'pengampus.id_matakuliah', '=', 'matakuliahs.id')
        // ->orderBy('matakuliahs.nama', 'asc'); //error di bpanggil id, karena thubung dengan matakuliah
        $pe->orderBy('id_matakuliah');
        $pe->orderBy('penanggung_jawab', 'desc');

        return view('livewire.pengampu-index',[
            'isiTabel'=>$pe->paginate(30),
            'jurusan'=>jurusan::all(),
        ]);
    }

    public function hapus($id)
    {
        Pengampu::find($id)->delete();
        $this->emit('swalDeleted');
    }
    public function hapusSemuaPengampu()
    {
        foreach (Pengampu::all() as $value) {
            $value->delete();
        };
        $this->emit('swalDeleted');
    }

    public function hapusJadwal($id)
    {
        slotjadwal::find($id)->delete();
        $this->emit('swalDeleted');
    }
}
