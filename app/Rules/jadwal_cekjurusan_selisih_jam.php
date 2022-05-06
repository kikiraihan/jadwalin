<?php

namespace App\Rules;

use App\Models\Pengampu;
use App\Models\slotjam;
use Illuminate\Contracts\Validation\DataAwareRule;
use Illuminate\Contracts\Validation\Rule;

class jadwal_cekjurusan_selisih_jam implements Rule, DataAwareRule
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


    /*
        cek apakah slot jam yang sama ini,
        memiliki pengampu yang punya jurusan yang sama,
        kalau sama maka tidak bisa diinput,
        kalau beda aman
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
                $query->whereHas('matakuliah',function($query) use ($value){
                    $query->whereHas('jurusan', function($query) use ($value){
                        $query->where('id',$this->getJurusanByPengampu($value)->id);
                    });
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
        return 'Terdapat data pengampu lain dengan jurusan yang sama dan pada jam yang sama. Untuk menghindari tabrakan jam kuliah mahasiswa, maka tidak bisa diinputkan. Silahkan memilih slotjam lain atau memilih data pengampu lain.';
    }

    public function getJurusanByPengampu($id_pengampu)
    {
        return Pengampu::find($id_pengampu)->matakuliah->jurusan;
    }
}
