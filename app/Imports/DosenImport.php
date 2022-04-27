<?php

namespace App\Imports;

use App\Models\Dosen;
use App\Models\jurusan;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Validation\Rule;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Concerns\SkipsOnError;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\SkipsErrors;


class DosenImport implements ToModel, WithHeadingRow, SkipsOnError, WithValidation
{
    use Importable, SkipsErrors;

    public function __construct()
    {
        $this->semuaJurusan=jurusan::semuaNama();
    }
    

    public function model(array $row)
    {
        return new Dosen([
            'nama' => $row['nama'],
            'nip' => $row['nip'],
            'jurusan' => $row['jurusan'],
        ]);
    }

    public function rules(): array
    {
        return [
            'nama' => [
                'required',
                'string',
            ],
            'nip' => [
                'required',
                'numeric',
                'unique:dosens,nip',
            ],
            'jurusan' => [
                'required',
                Rule::in($this->semuaJurusan),
            ],
        ];
    }
}
