<?php

namespace App\Rules;

use App\Models\slotjam;
use Illuminate\Contracts\Validation\DataAwareRule;
use Illuminate\Contracts\Validation\Rule;

class jadwal_cekruangan implements Rule,DataAwareRule
{
    protected $data = [];
    public function setData($data)
    {
        $this->data = $data;
 
        return $this;
    }

    public function __construct()
    {
    }

    public function passes($attribute, $value)
    {
        $jam=slotjam::find($this->data['id_slot_jam']);
        $ini=$jam->slotjadwal()->whereHas('ruangan',function($query) use ($value){
            $query->where('id',$value);
        })->count();
        if($ini>0){
            return false;
        }
        return true;
    }

    public function message()
    {
        return 'Ruangan sudah terpakai di hari dan jam yang sama.';
    }
}
