<?php

namespace App\Http\Livewire;

use App\Models\Ruangan;
use Livewire\Component;

class RuanganAdd extends Component
{
    public Ruangan $ru;

    protected $rules = [
        'ru.nama'      =>'required|string|max:255',
        'ru.kapasitas'      =>'required|numeric',
        'ru.kategori'      =>'required|in:teori,praktek',
    ];

    public function mount()
    {
        $this->ru = new Ruangan;
    }

    public function save()
    {
        $this->validate();
        $this->ru->save();
        $this->mount();
        $this->emit('swalAdded');
    }

    public function render()
    {
        return view('livewire.ruangan-add');
    }
}
