<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class slotjam extends Model
{
    use HasFactory;

    protected $fillable=[
        'id_hari',
        'awal',
        'akhir',
    ];

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
}
