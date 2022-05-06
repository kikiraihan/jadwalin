<?php

namespace App\Rules;

use App\Models\Pengampu;
use App\Models\slotjam;
use Illuminate\Contracts\Validation\DataAwareRule;
use Illuminate\Contracts\Validation\Rule;

class jadwal_ceksks implements Rule,DataAwareRule
{
    protected $data = [], $sksJam;
    public function setData($data)
    {
        $this->data = $data;
        return $this;
    }
    public function __construct(){}


    /*
        cek sks mk kalau sesuai dengan sks slotjam.
    */ 
    public function passes($attribute, $value)
    {
        $jam=slotjam::find($this->data['id_slot_jam']);
        $this->sksJam=$jam->sks;
        return $jam->sks==$this->getMatakuliahByPengampu($value)->sks;
    }

    public function message()
    {
        return 'SKS pada Matakuliah, harus sama dengan SKS pada slot Jam ('.$this->sksJam.' sks).';
    }

    public function getMatakuliahByPengampu($id_pengampu)
    {
        return Pengampu::with('matakuliah')->find($id_pengampu)->matakuliah;
    }
}
