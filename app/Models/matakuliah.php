<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class matakuliah extends Model
{
    use HasFactory;
    protected $fillable=[
        'nama',
        'kode_mk',
        'id_jurusan',
        'semester',
        'sks',
        'kategori'
    ];

    public function pengampus()
    {
        return $this->hasMany(  
            Pengampu::class,
            'id_matakuliah',
            'id'
        );
    }

    public function jurusan()
    {
        return $this->belongsTo(
            jurusan::class,
            'id_jurusan',
            'id'
        );
    }
    
}
