<?php

namespace App\Http\Livewire;

use App\Models\Hari;
use App\Models\slotjam;
use App\Rules\minimal_minutes_range;
use Livewire\Component;

class SlotJamEdit extends Component
{
    public slotjam $jam;
    public $idTo;

    protected function rules()
    {
        return [
            'jam.id_hari'   =>'required|integer',
            'jam.awal'      =>'required|date_format:H:i',
            'jam.akhir'     => ['required', 'date_format:H:i', new minimal_minutes_range([$this->jam->awal,$this->jam->sks])],
            'jam.sks'       =>'required|integer',
        ];
    }

    public function mount($id)
    {
        $this->jam = slotjam::find($id);
        $this->idTo = $id;
    }

    public function save()
    {
        $this->validate();
        // dd($this->jam);
        $this->jam->save();
        $this->mount($this->idTo);
        $this->emit('swalUpdated');
    }



    public function render()
    {
        return view('livewire.slot-jam-edit',[
            'hari'=>Hari::all(),
        ]);
    }
}
