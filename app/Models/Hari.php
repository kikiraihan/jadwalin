<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hari extends Model
{
    use HasFactory;

    protected $fillable=[
        'nama'
    ];


    public function slotjam()
    {
        return $this->hasMany(slotjam::class,'id_hari','id');
    }
}
