<?php

namespace App\Rules;

use App\Models\slotjam;
use Illuminate\Contracts\Validation\DataAwareRule;
use Illuminate\Contracts\Validation\Rule;

class jadwal_cekruangan_selisih_jam implements Rule, DataAwareRule
{
    protected $data = [];
    public function setData($data)
    {
        $this->data = $data;
 
        return $this;
    }

    public function __construct(){}

    public function passes($attribute, $value)
    {
        $jam=slotjam::find($this->data['id_slot_jam']);

        $jamlain=slotjam::with('slotjadwal')
        ->where('id','!=',$jam->id)
        ->where('id_hari',$jam->id_hari)
        ->where(function($query) use($jam)
        {
            $query
            ->whereTime('awal', "<=", $jam->akhir)
            ->whereTime('akhir', ">=", $jam->awal);
        })
        ->get();

        foreach ($jamlain as $key => $cek)
        {
            $ini=$cek->slotjadwal()->whereHas('ruangan',function($query) use ($value){
                $query->where('id',$value);
            })->count();
            if($ini>0){
                return false;
            }
        }

        return true;
    }

    public function message()
    {
        return 'Ruangan sudah terpakai di hari dan jam yang sama.';
    }
}
