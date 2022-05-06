<?php

namespace App\Rules;

use App\Models\Pengampu;
use Illuminate\Contracts\Validation\Rule;

class cek_sudah_ada_pengampu implements Rule
{
    public $param;

    public function __construct($param)
    {
        $this->param = $param;
    }

    public function passes($attribute, $value)
    {
        if ($value==1) {
            $cek=Pengampu::where('id_matakuliah',$this->param)
            ->where('penanggung_jawab',1)
            ->count();
            return $cek==0;
        }

        return true;
    }

    public function message()
    {
        return 'Sudah ada yang menjadi penanggung jawab untuk tim matakuliah ini';
    }
}
