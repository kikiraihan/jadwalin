<?php

namespace App\Http\Livewire;

use App\Models\Ruangan;
use Livewire\Component;

class RuanganEdit extends Component
{
    public Ruangan $ru;
    public $idTo;

    protected function rules()
    {
        return [
            'ru.nama'           =>'required|string|max:255',
            'ru.kapasitas'      =>'required|numeric',
            'ru.kategori'       =>'required|in:teori,praktek',
        ];
    }

    public function mount($id)
    {
        $this->ru = Ruangan::find($id);
        $this->idTo = $id;
    }

    public function save()
    {
        $this->validate();
        $this->ru->save();
        $this->mount($this->idTo);
        $this->emit('swalUpdated');
    }


    public function render()
    {
        return view('livewire.ruangan-edit');
    }
}
