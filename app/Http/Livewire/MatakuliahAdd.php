<?php

namespace App\Http\Livewire;

use App\Models\jurusan;
use App\Models\matakuliah;
use Livewire\Component;

class MatakuliahAdd extends Component
{
    public matakuliah $mk;
    public $id_jurusan;
    public $search;

    protected $rules = [
        'mk.nama'      =>'required|min:3|max:255',
        'mk.kode_mk'      =>'required|unique:matakuliahs,kode_mk',
        'id_jurusan'      =>'required|exists:jurusans,id',
        'mk.semester'      =>'required|numeric',
        'mk.sks'      =>'required|numeric',
        'mk.kategori'      =>'required|in:teori,praktek',
    ];

    public function mount()
    {
        $this->mk = new matakuliah();
        $this->id_jurusan=null;
    }

    public function pilih($id)
    {
        $this->id_jurusan = $id;
    }

    public function save()
    {
        // dd('jalan');
        $this->validate();
        $this->mk->id_jurusan = $this->id_jurusan;
        $this->mk->save();
        $this->mount();
        $this->emit('swalAdded');
    }



    public function render()
    {
        $jur=jurusan::where('nama', 'like', '%'.$this->search.'%');

        return view('livewire.matakuliah-add',[
            'jur' => $jur->paginate(5),
            'dipilih'=> $this->id_jurusan?jurusan::find($this->id_jurusan):null,
        ]);
    }
}
