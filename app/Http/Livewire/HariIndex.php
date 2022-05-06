<?php

namespace App\Http\Livewire;

use App\Models\Hari;
use Livewire\Component;

class HariIndex extends Component
{
    protected $listeners=[
        'FixHapusHari'=>'hapus',
    ];

    public function render()
    {
        return view('livewire.hari-index',[
            'isiTabel'=>Hari::all(),
        ]);
    }

    public function hapus($id)
    {
        $j=Hari::find($id);
        $j->delete();
        $this->emit('swalDeleted');
    }
}
