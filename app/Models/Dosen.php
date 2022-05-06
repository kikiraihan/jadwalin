<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Dosen extends Model
{
    use HasFactory;

    protected $fillable=[
        'nama',
        'nip',
        'bidang_studi',
    ];

    protected $appends=[
        'jumlah_bimbingan',
    ];

    public function getJumlahBimbinganAttribute()
    {
        return $this->bimbingans()->count();
    }


    // many to many
    public function bimbingans()
    {
        return $this->belongsToMany
        (
            Mahasiswa::class, 
            'pembimbings',
            'id_dosen',
            'id_mahasiswa',
        )
        ->withPivot(
            'urutan',
            )
        ;
    }

    public function jamtidakbersedia()
    {
        return $this->belongsToMany(
            slotjam::class,
            'jamtidakbersedias',
            'id_dosen',
            'id_slotjam',
        );
    }

    public function pengampus()
    {
        return $this->hasMany(  
            Pengampu::class,
            'id_dosen',
            'id'
        );
    }

    public function matakuliahDiampu()
    {
        return $this->belongsToMany(
            Matakuliah::class,
            'pengampus',
            'id_dosen',
            'id_matakuliah',
        );
    }
}
