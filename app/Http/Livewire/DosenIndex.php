<?php

namespace App\Http\Livewire;

use App\Models\Dosen;
use App\Models\Mahasiswa;
use Livewire\Component;
use Livewire\WithPagination;

class DosenIndex extends Component
{
    use WithPagination;

    protected $listeners=[
        'terkonfirmasiHapusDosen'=>'fixRemoveDosen',
        'terkonfirmasiEditDosen'=>'fixEditDosen',
    ];

    // untuk pencarian
    public $search;


    public function render()
    {
        $d=Dosen::where('nama', 'like', '%'.$this->search.'%');

        return view('livewire.dosen-index',[
            'isiTabel'=>$d->paginate(30),
        ]);
    }

    public function editDosen($idDosen)
    {
        $d=Dosen::find($idDosen);

        $isi = view('swalForm.editDosen', [
            'dosen'=>$d,
            'idDosen'=>$idDosen,
            ])->render();
        
        $this->emit('swalEditDosen','Edit Dosen',$isi, $idDosen);
    }

    public function fixEditDosen($value, $idDosen)
    {
        $d=Dosen::find($idDosen);
        $d->nama=$value['nama'];
        $d->nip=$value['nip'];
        $d->bidang_studi=$value['bidang_studi'];
        $d->save();
    }

    public function fixRemoveDosen($idDosen)
    {
        Dosen::find($idDosen)->delete();
    }
}
