<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ruangan extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'kapasitas',
        'kategori',
    ];

    public function slotjadwal()
    {
        return $this->hasMany(slotjadwal::class,'id_ruangan','id');
    }
}
