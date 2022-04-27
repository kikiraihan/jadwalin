<?php

namespace App\Http\Livewire;

use App\Models\jurusan;
use Livewire\Component;

class JurusanAdd extends Component
{
    public jurusan $jur;

    protected $rules = [
        'jur.nama'      =>'required',
    ];

    public function mount()
    {
        $this->jur = new jurusan;
    }

    public function save()
    {
        $this->validate();
        $this->jur->save();
        $this->mount();
        $this->emit('swalAdded');
    }


    public function render()
    {
        return view('livewire.jurusan-add');
    }
}
