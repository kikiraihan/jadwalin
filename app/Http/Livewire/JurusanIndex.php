<?php

namespace App\Http\Livewire;

use App\Models\jurusan;
use Livewire\Component;
use Livewire\WithPagination;

class JurusanIndex extends Component
{
    use WithPagination;

    protected $listeners=[
        'FixHapusJurusan'=>'hapus',
    ];

    // untuk pencarian
    public $search;

    public function render()
    {
        $d=jurusan::
        where('nama', 'like', '%'.$this->search.'%')
        ;

        return view('livewire.jurusan-index',[
            'isiTabel'=>$d->paginate(30),
        ]);
    }

    public function hapus($id)
    {
        $j=jurusan::find($id);
        $j->delete();
        $this->emit('swalDeleted');
    }
}
