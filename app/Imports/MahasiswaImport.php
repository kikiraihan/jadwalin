<?php

namespace App\Imports;

use App\Models\jurusan;
use App\Models\Mahasiswa;
use Maatwebsite\Excel\Concerns\ToModel;

use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Validation\Rule;
use Maatwebsite\Excel\Concerns\WithValidation;
// use Maatwebsite\Excel\Concerns\SkipsOnError;
use Maatwebsite\Excel\Concerns\Importable;
// use Maatwebsite\Excel\Concerns\SkipsErrors;

class MahasiswaImport implements ToModel, WithHeadingRow, WithValidation
{
    use Importable;

    public function __construct()
    {
        $ar=jurusan::select(['id','nama'])->get()->toArray();
        $return=[];
        foreach ($ar as $key => $value) {
            $return[$value['nama']]=$value['id'];
        }
        $this->cariId=$return;
        $this->semuaJurusan=jurusan::semuaId();
    }
    
    public function model(array $row)
    {
        return new Mahasiswa([
            'nama'  =>$row['nama'],
            'nim'     =>$row['nim'],
            'id_jurusan'=>$row['id_jurusan'], //$this->cariId[$row['id_jurusan']],
        ]);
    }

    public function rules(): array
    {
        return [
            'nama' => [
                'required',
                'string',
            ],
            'nim' => [
                'required',
                'numeric',
                'unique:mahasiswas,nim',
            ],
            'id_jurusan' => [
                'required',
                Rule::in($this->semuaJurusan),
            ],
        ];
    }
}
