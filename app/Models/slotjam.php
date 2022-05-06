<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class slotjam extends Model
{
    use HasFactory;

    protected $fillable=[
        'id_hari',
        'awal',
        'akhir',
        'sks',
    ];

    // parent
    public function hari()
    {
        return $this->belongsTo(Hari::class,'id_hari','id');
    }
    
    public function jamtidakbersedia()
    {
        return $this->belongsToMany(
            Dosen::class,
            'jamtidakbersedias',
            'id_slotjam',
            'id_dosen',
        );
    }

    // child
    public function slotJadwal(){
        return $this->hasMany(slotjadwal::class,'id_slot_jam','id');
    }


    // atribute
    public function getAwalAttribute($value)
    {
        return Carbon::parse($value)->format('H:i');
    }

    public function getAkhirAttribute($value)
    {
        return Carbon::parse($value)->format('H:i');
    }
}
