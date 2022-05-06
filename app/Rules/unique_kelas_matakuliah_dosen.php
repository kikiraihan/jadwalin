<?php

namespace App\Rules;

use App\Models\Pengampu;
use Illuminate\Contracts\Validation\Rule;

class unique_kelas_matakuliah_dosen implements Rule
{
    public $param;

    public function __construct($param)
    {
        $this->param = $param;
    }

    public function passes($attribute, $value)
    {
        $cek=Pengampu::where('id_matakuliah',$this->param[0])
        ->where('id_dosen',$this->param[1])
        ->where('kelas',$this->param[2])
        ->count();
        return $cek==0;
    }


    public function message()
    {
        return 'Kombinasi matakuliah, dosen, dan kelas tersebut sudah dibuat sebelumnya.';
    }
}
