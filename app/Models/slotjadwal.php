<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class slotjadwal extends Model
{
    use HasFactory;

    protected $fillable=[
        'id_slot_jam',
        'id_jurusan',
        'id_ruangan',
        'id_pengampu',
        'kelas',
    ];

    public function slotjam()
    {
        return $this->belongsTo(slotjam::class,'id_slot_jam');
    }

    public function jurusan()
    {
        return $this->belongsTo(jurusan::class,'id_jurusan');
    }

    public function ruangan()
    {
        return $this->belongsTo(ruangan::class,'id_ruangan');
    }

    public function pengampu()
    {
        return $this->belongsTo(pengampu::class,'id_pengampu');
    }
}
