<?php

namespace App\Http\Livewire;

use App\Models\jurusan;
use App\Models\Mahasiswa as ModelsMahasiswa;
use Livewire\Component;
use Livewire\WithPagination;

class Mahasiswa extends Component
{
    use WithPagination;

    protected $listeners=[
        'terkonfirmasiHapusMahasiswa'=>'fixRemoveMahasiswa',
        'terkonfirmasiEditMahasiswa'=>'fixEditMahasiswa',
    ];

    public $search;
    public $filterIdJurusan;

    public function render()
    {
        $m=ModelsMahasiswa::
        where('nama', 'like', '%'.$this->search.'%')
        ;
        if($this->filterIdJurusan) $m->where('id_jurusan',  $this->filterIdJurusan);

        return view('livewire.mahasiswa', [
            'isiTabel'=>$m->paginate(30),
            'jurusan'=>jurusan::all(),
        ]);
    }

    public function fixRemoveMahasiswa($idTo)
    {
        ModelsMahasiswa::find($idTo)->delete();
    }

    public function editMahasiswa($idMahasiswa)
    {
        $m=ModelsMahasiswa::with(['jurusan'])->where('id',$idMahasiswa)->first();

        $isi = view('swalForm.editMahasiswa', [
            'm'=>$m,
            'j'=>jurusan::all(),
            'idMahasiswa'=>$idMahasiswa,
            ])->render();
        
        $this->emit('swalEditMahasiswa','Edit Mahasiswa',$isi, $idMahasiswa);
    }

    public function fixEditMahasiswa($value, $idMahasiswa)
    {
        $d=ModelsMahasiswa::find($idMahasiswa);
        $d->nama=$value['nama'];
        $d->nim=$value['nim'];
        $d->id_jurusan=$value['jurusan'];
        $d->save();
    }
}
