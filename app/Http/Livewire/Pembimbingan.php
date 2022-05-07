<?php

namespace App\Http\Livewire;

use App\Models\Dosen;
use App\Models\Mahasiswa;
use Livewire\Component;
use Livewire\WithPagination;

class Pembimbingan extends Component
{
    use WithPagination;

    protected $listeners=[
        'terkonfirmasiInputBimbingan'=>'fixInputBimbingan',
        'terkonfirmasiRemoveBimbingan'=>'fixRemoveBimbingan',
    ];

    // untuk pencarian
    public $search;


    public function render()
    {
        $d=Dosen::with('bimbingans')
        ->where('nama', 'like', '%'.$this->search.'%')
        ;

        return view('livewire.pembimbingan',[
            'isiTabel'=>$d->paginate(30),
        ]);
    }

    public function inputBimbingan($idDosen)
    {
        if(Dosen::find($idDosen)->jumlah_bimbingan<8)
            return $this->emit('swalInputBimbingan',$idDosen);
        else
            return $this->emit('swalMessageError','Maksimal hanya dapat membimbing 8 orang mahasiswa');
    }

    public function fixInputBimbingan($value, $idDosen)
    {
        $m=Mahasiswa::where('nim',$value)->with('pembimbings')->first();

        if(!$m) return $this->emit('swalMessageError', 'NIM tidak ditemukan');
        $d=Dosen::find($idDosen);
        $d->bimbingans()->attach($m->id,['urutan'=>($m->pembimbings->count()+1)]);//231882190

        $this->emit('swalUpdated');
        
    }

    public function removeBimbingan($idDosen)
    {
        $m=Mahasiswa::whereHas('pembimbings', function ($q) use($idDosen){
            return $q->where('id_dosen',$idDosen);
        })->get();
        
        $isi='';
        if($m->isEmpty())
        $isi='Kosong';
        else
        {
            foreach ($m as $key => $per) 
            {
                $isi.='<div class="flex align-items-center gap-1 justify-between hover:bg-gray-200">
                    <span>'.$per->nama.'</span>
                    <span class="text-red-400 cursor-pointer" onclick="window.livewire.emit(`terkonfirmasiRemoveBimbingan`,`'.$per->id.'`,`'.$idDosen.'`)">
                        <i class="material-icons">
                            highlight_off
                        </i>
                    </span>
                </div> ';
            }
        }

        $this->emit('swalRemoveBimbingan',$isi);
    }
    
    public function fixRemoveBimbingan($idMahasiswa, $idDosen)
    {
        $d=Dosen::find($idDosen);
        $d->bimbingans()->detach($idMahasiswa);

        $this->emit('swalUpdated');
    }

}
