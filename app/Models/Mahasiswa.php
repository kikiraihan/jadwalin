<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory;

    protected $fillable=[
        'nama',
        'nim',
        'id_jurusan',
    ];


    // many to many
    public function pembimbings()
    {
        return $this->belongsToMany
        (
            Dosen::class, 
            'pembimbings',
            'id_mahasiswa',
            'id_dosen',
        )
        ->withPivot(
            'urutan',
            )
        ;
    }

    public function jurusan()
    {
        return $this->belongsTo(jurusan::class,'id_jurusan','id');
    }

}
