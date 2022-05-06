<?php

namespace App\Http\Livewire;

use App\Models\Ruangan;
use Livewire\Component;
use Livewire\WithPagination;

class RuanganIndex extends Component
{
    use WithPagination;

    protected $listeners=[
        'FixHapusRuangan'=>'hapus',
    ];

    // untuk pencarian
    public $search;

    public function render()
    {
        $r=Ruangan::
        where('nama', 'like', '%'.$this->search.'%')
        ;

        return view('livewire.ruangan-index',[
            'isiTabel'=>$r->paginate(30),
        ]);
    }

    public function hapus($id)
    {
        Ruangan::find($id)->delete();
        $this->emit('swalDeleted');
    }
}
