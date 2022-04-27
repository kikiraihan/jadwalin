<?php

namespace App\Http\Livewire;

use App\Models\jurusan;
use Livewire\Component;

class JurusanEdit extends Component
{
    public jurusan $jur;
    public $idTo;

    protected $rules = [
        'jur.nama'      =>'required',
    ];

    public function mount($id)
    {
        $this->jur = jurusan::find($id);
        $this->idTo = $id;
    }

    public function save()
    {
        $this->validate();
        $this->jur->save();
        $this->mount($this->idTo);
        $this->emit('swalUpdated');
    }

    public function render()
    {
        return view('livewire.jurusan-edit');
    }
}
