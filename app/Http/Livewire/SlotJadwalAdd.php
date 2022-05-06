<?php

namespace App\Http\Livewire;

use App\Models\Pengampu;
use App\Models\Ruangan;
use App\Models\slotjadwal;
use App\Models\slotjam;
use App\Rules\jadwal_cekdosen;
use App\Rules\jadwal_cekdosen_selisih_jam;
use App\Rules\jadwal_cekjurusan;
use App\Rules\jadwal_cekjurusan_selisih_jam;
use App\Rules\jadwal_cekruangan;
use App\Rules\jadwal_cekruangan_selisih_jam;
use App\Rules\jadwal_ceksks;
use Livewire\Component;
use Livewire\WithPagination;

class SlotJadwalAdd extends Component
{
    use WithPagination;
    public slotjadwal $sj;

    public $id_slot_jam;
    public $id_ruangan;
    public $id_pengampu;
    public $search_ruangan;
    public $search_pengampu;
    // public $search_slot_jam;
    // 'kelas',

    protected function rules()
    {
        return [
            'id_slot_jam'   =>[
                'required',
                'string',
            ],
            'id_ruangan'   =>[
                'required',
                'integer',
                new jadwal_cekruangan,
                new jadwal_cekruangan_selisih_jam
            ],
            'id_pengampu'   =>[
                'required',
                'integer',
                new jadwal_cekjurusan,
                new jadwal_cekjurusan_selisih_jam,
                new jadwal_cekdosen,
                new jadwal_cekdosen_selisih_jam,
                new jadwal_ceksks
            ],
        ];
    }

    public function mount($id_slot_jam)
    {
        $this->sj = new slotjadwal;
        $this->id_slot_jam=$id_slot_jam;
        $this->id_ruangan=null;
        $this->id_pengampu=null;
    }

    public function save()
    {

        $this->validate();
        $this->sj->id_slot_jam = $this->id_slot_jam;
        $this->sj->id_ruangan = $this->id_ruangan;
        $this->sj->id_pengampu = $this->id_pengampu;
        $this->sj->save();
        $this->mount($this->id_slot_jam);
        $this->emit('swalAdded');
    }

    public function render()
    {
        $ru=Ruangan::where('nama', 'like', '%'.$this->search_ruangan.'%');
        $peng=Pengampu::with(['matakuliah.jurusan','dosen'])
        ->doesntHave('slotJadwal')
        ->where(function ($query) {
            $query->whereHas('matakuliah', function ($query) {
                $query->where('nama', 'like', '%'.$this->search_pengampu.'%');
            })->orWhereHas('dosen', function ($query) {
                $query->where('nama', 'like', '%'.$this->search_pengampu.'%');
            });
        });

        return view('livewire.slot-jadwal-add',[
            'ru'=>$ru->paginate(5),
            'peng'=>$peng->paginate(5),
            'dipilihRuangan'=> $this->id_ruangan?Ruangan::find($this->id_ruangan):null,
            'dipilihPengampu'=> $this->id_pengampu?Pengampu::find($this->id_pengampu):null,
            'slotJam'=>slotjam::with('hari')->find($this->id_slot_jam),
        ]);
    }


    public function pilihRuangan($id)
    {
        $this->id_ruangan = $id;
    }
    public function pilihPengampu($id)
    {
        $this->id_pengampu = $id;
    }
}
