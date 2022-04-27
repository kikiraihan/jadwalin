<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class jamtidakbersedia extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_slotjam',
        'id_dosen'
    ];

    public function slotjam()
    {
        return $this->belongsTo(slotjam::class,'id_slotjam','id');
    }

    public function dosen()
    {
        return $this->belongsTo(Dosen::class,'id_dosen','id');
    }
}
