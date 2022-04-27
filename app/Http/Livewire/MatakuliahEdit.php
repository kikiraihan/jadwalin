<?php

namespace App\Http\Livewire;

use App\Models\jurusan;
use App\Models\matakuliah;
use Livewire\Component;

class MatakuliahEdit extends Component
{
    public matakuliah $mk;
    public $idTo;
    public $id_jurusan;
    public $search;

    protected function rules()
    {
        return [
            'mk.nama'      =>'required|min:3|max:255',
            'mk.kode_mk'      =>'required|unique:matakuliahs,kode_mk,'. $this->mk->kode_mk.',kode_mk',
            'id_jurusan'      =>'required|exists:jurusans,id',
            'mk.semester'      =>'required|numeric',
            'mk.sks'      =>'required|numeric',
            'mk.kategori'      =>'required|in:teori,praktek',
        ];
    }

    public function mount($id)
    {
        $this->mk = matakuliah::find($id);
        $this->idTo = $id;
        $this->id_jurusan = $this->mk->id_jurusan;
    }


    public function pilih($id)
    {
        $this->id_jurusan = $id;
    }

    public function save()
    {
        $this->validate();
        $this->mk->id_jurusan = $this->id_jurusan;
        $this->mk->save();
        $this->mount($this->idTo);
        $this->emit('swalUpdated');
    }


    public function render()
    {
        $jur=jurusan::where('nama', 'like', '%'.$this->search.'%');

        return view('livewire.matakuliah-edit',[
            'jur' => $jur->paginate(5),
            'dipilih'=> $this->id_jurusan?jurusan::find($this->id_jurusan):null,
        ]);
    }
}
