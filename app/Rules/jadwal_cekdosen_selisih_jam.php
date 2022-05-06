<?php

namespace App\Rules;

use App\Models\Pengampu;
use App\Models\slotjam;
use Illuminate\Contracts\Validation\DataAwareRule;
use Illuminate\Contracts\Validation\Rule;

class jadwal_cekdosen_selisih_jam implements Rule, DataAwareRule
{
    protected $data = [];
    public function setData($data)
    {
        $this->data = $data;
        return $this;
    }
    public function __construct(){}


    /*
        Cek dosen pengajar apakah ada matakuliah juga di jam yang sama.
    */ 
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
            $ini=$cek->slotjadwal()->whereHas('pengampu',function($query) use ($value){
                $query->whereHas('dosen',function($query) use ($value){
                    $query->where('id',$this->getDosenByPengampu($value)->id);
                });
            })->count();
            if($ini>0){
                return false;
            }
        }

        return true;
    }

    public function message()
    {
        return 'Dosen pada pengampu ini memiliki matakuliah lain di jam yang sama. Silahkan memilih slot jam lain, atau memilih pengampu lain.';
    }

    public function getDosenByPengampu($id_pengampu)
    {
        return Pengampu::find($id_pengampu)->dosen;
    }
}
