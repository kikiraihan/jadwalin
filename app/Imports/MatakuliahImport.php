<?php

namespace App\Imports;

use App\Models\jurusan;
use App\Models\Matakuliah;
use Illuminate\Validation\Rule;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\SkipsErrors;
use Maatwebsite\Excel\Concerns\SkipsOnError;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class MatakuliahImport implements ToModel, WithHeadingRow, SkipsOnError, WithValidation
{
    use Importable, SkipsErrors;

    public function __construct()
    {
        $this->listJurusan=[];
        foreach (jurusan::all() as $value) $this->listJurusan[]=$value->nama;
    }

    public function rules(): array
    {
        return [
            'nama'=>[
                'required','string',
            ],
            'semester'=>[
                'required',
                'numeric',
            ],
            'sks'=>[
                'required',
                'numeric',
            ],
            'jurusan'=>[
                'required','string',
                Rule::in($this->listJurusan),
            ],
            'kodemk'=>[
                'required',
                'numeric',
                'unique:matakuliahs,kode_mk',
            ],
            'kategori'=>[
                'required','string',
                'in:TEORI,PRAKTEK,teori,praktek,Teori,Praktek',
            ],
        ];
    }

    public function model(array $row)
    {
        return new Matakuliah([
            'nama'=>$row['nama'],
            'kode_mk'=>$row['kodemk'],
            'id_jurusan'=>jurusan::where('nama', $row['jurusan'])->first()->id,
            'semester'=>$row['semester'],
            'sks'=>$row['sks'],
            'kategori'=>strtolower($row['kategori']),
        ]);
    }
}
