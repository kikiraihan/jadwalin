<?php

namespace App\Http\Livewire;

use App\Models\Hari;
use Livewire\Component;

class HariAdd extends Component
{
    public Hari $ha;

    protected $rules = [
        'ha.nama'      =>'required',
    ];

    public function mount()
    {
        $this->ha = new Hari;
    }

    public function save()
    {
        $this->validate();
        $this->ha->save();
        $this->mount();
        $this->emit('swalAdded');
    }



    public function render()
    {
        return view('livewire.hari-add');
    }
}
