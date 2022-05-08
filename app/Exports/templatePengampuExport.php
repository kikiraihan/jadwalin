<?php

namespace App\Exports;

use App\Models\matakuliah;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class templatePengampuExport implements FromQuery, WithMapping, WithHeadings
{
    use Exportable;

    public function __construct($filterIdJurusan,$filterSemester)
    {
        $this->filterIdJurusan=$filterIdJurusan;
        $this->filterSemester=$filterSemester;
    }

    public function query()
    {
        $table=matakuliah::with(['jurusan']);
        if($this->filterIdJurusan) $table->where('id_jurusan', $this->filterIdJurusan);
        if($this->filterSemester) $table->where('semester', $this->filterSemester);

        return $table;
    }

    public function headings(): array
    {
        return [
            // '#',
            'ID',
            'JURUSAN',
            'MATAKULIAH',
            'SEMESTER',
            'KODE',
            'DOSEN',
            'NIP',
            'PENANGGUNG_JAWAB',
            'KELAS',
        ];
    }

    public function map($table): array
    {
        return [
            $table->id,
            $table->jurusan->nama,
            $table->nama,
            $table->semester,
            $table->kode_mk,
            '',
            '',
            '',
            '',
        ];
    }
}
