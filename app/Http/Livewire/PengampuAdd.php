<?php

namespace App\Http\Livewire;

use App\Models\Dosen;
use App\Models\matakuliah;
use App\Models\Pengampu;
use App\Rules\cek_sudah_ada_pengampu;
use App\Rules\unique_kelas_matakuliah_dosen;
use Illuminate\Validation\Rule;
use Livewire\Component;
use Livewire\WithPagination;

class PengampuAdd extends Component
{
    use WithPagination;
    public Pengampu $peng;
    public $id_matakuliah;
    public $id_dosen;
    public $searchDosen;
    public $searchMatakuliah;

    protected function rules()
    {
        return [
            'id_dosen'   =>[
                'required',
                'integer',
                new unique_kelas_matakuliah_dosen([$this->id_matakuliah,$this->id_dosen,$this->peng->kelas]),
            ],
            'id_matakuliah'   =>[
                'required',
                'integer',
                new unique_kelas_matakuliah_dosen([$this->id_matakuliah,$this->id_dosen,$this->peng->kelas]),
            ],
            'peng.penanggung_jawab'   =>[
                'required', 
                'boolean', 
                new cek_sudah_ada_pengampu($this->id_matakuliah)
            ],
            'peng.kelas' => [
                'required', 
                Rule::in(['A','B','C','D','E']),
                new unique_kelas_matakuliah_dosen([$this->id_matakuliah,$this->id_dosen,$this->peng->kelas]),
            ],
        ];
    }

    public function mount()
    {
        $this->peng = new Pengampu;
        $this->id_matakuliah=null;
        $this->id_dosen=null;
    }

    public function pilihDosen($id)
    {
        $this->id_dosen = $id;
    }

    public function pilihMatakuliah($id)
    {
        $this->id_matakuliah = $id;
    }

    public function save()
    {
        $this->validate();
        $this->peng->id_dosen = $this->id_dosen;
        $this->peng->id_matakuliah = $this->id_matakuliah;
        $this->peng->save();
        $this->mount();
        $this->emit('swalAdded');
    }

    public function render()
    {
        $do=Dosen::where('nama', 'like', '%'.$this->searchDosen.'%');
        $mk=matakuliah::with('jurusan')->where('nama', 'like', '%'.$this->searchMatakuliah.'%');

        return view('livewire.pengampu-add',[
            'do' => $do->paginate(5),
            'mk' => $mk->paginate(5),
            'dipilihDosen'=> $this->id_dosen?Dosen::find($this->id_dosen):null,
            'dipilihMatakuliah'=> $this->id_matakuliah?matakuliah::find($this->id_matakuliah):null,
        ]);
    }
}
