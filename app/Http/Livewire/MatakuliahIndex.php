<?php

namespace App\Http\Livewire;

use App\Models\jurusan;
use App\Models\matakuliah;
use Livewire\Component;
use Livewire\WithPagination;

class MatakuliahIndex extends Component
{
    use WithPagination;

    protected $listeners=[
        'FixHapusMatakuliah'=>'hapus',
        'FixHapusSemuaMatakuliah'=>'hapusSemua',
    ];

    // untuk pencarian
    public $search;
    public $filterIdJurusan;
    public $filterSemester;

    public function render()
    {
        $d=matakuliah::with(['jurusan'])
        ->where('nama', 'like', '%'.$this->search.'%')
        ;
        if($this->filterIdJurusan) $d->where('id_jurusan',  $this->filterIdJurusan);
        if($this->filterSemester) $d->where('semester',  $this->filterSemester);

        return view('livewire.matakuliah-index',[
            'isiTabel'=>$d->paginate(30),
            'jurusan'=>jurusan::all(),
        ]);
    }

    public function hapus($id)
    {
        matakuliah::find($id)->delete();
        $this->emit('swalDeleted');
    }

    public function hapusSemua()
    {
        foreach (matakuliah::all() as $key => $value) {
            $value->delete();
        };
        $this->emit('swalDeleted');
    }
}
