<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class jurusan extends Model
{
    use HasFactory;

    protected $fillable=[
        'nama'
    ];

    public function matakuliahs()
    {
        return $this->hasMany(matakuliah::class,'id_jurusan','id');
    }


    // STATIC METHOD
    public static function semuaNama()
    {
        $ar=(new static)::select(['nama'])->get()->toArray();
        $return=[];
        foreach ($ar as $key => $value) {
            $return[]=$value['nama'];
        }
        return $return;
    }

    public static function semuaId()
    {
        $ar=(new static)::select(['id'])->get()->toArray();
        $return=[];
        foreach ($ar as $key => $value) {
            $return[]=$value['id'];
        }
        return $return;
    }

    public function getNamaSingkatAttribute()
    {
        $singkat=explode(" ",$this->nama);
        $return="";
        foreach($singkat as $s){
            $return=$return.substr($s,0,1);
        }

        return $return;
    }
}
