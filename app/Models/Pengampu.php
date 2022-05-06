<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengampu extends Model
{
    use HasFactory;

    protected $fillable=[
        'id_dosen',
        'id_matakuliah',
        'penanggung_jawab',//boolean
        'kelas',//A,B,C,D,E
    ];


    // Parent
    public function dosen()
    {
        return $this->belongsTo(Dosen::class,'id_dosen','id');
    }
    public function matakuliah()
    {
        return $this->belongsTo(matakuliah::class,'id_matakuliah','id');
    }

    // Child
    public function slotJadwal(){
        return $this->hasOne(slotjadwal::class,'id_pengampu','id');
    }

}
