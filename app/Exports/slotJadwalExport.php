<?php

namespace App\Exports;

use App\Models\slotjadwal;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class slotJadwalExport implements FromQuery, WithMapping, WithHeadings
{
    use Exportable;
    public $filterIdHari;

    public function __construct($hari)
    {
        $this->filterIdHari=$hari;
    }

    public function query()
    {
        $table=slotjadwal::with(['pengampu.dosen','pengampu.matakuliah.jurusan','ruangan','slotjam.hari']);
        if($this->filterIdHari) 
        {
            $table->whereHas('slotjam', function($query){
                $query->where('id_hari', $this->filterIdHari);
            });
        }

        return $table;
    }

    public function headings(): array
    {
        return [
            // '#',
            'JURUSAN',
            'NAMA MATAKULIAH',
            'KODE MATAKULIAH',
            'SEMESTER',
            'KELAS',
            'HARI',
            'JAM AWAL',
            'JAM AKHIR',
            'RUANGAN',
            'DOSEN',
        ];
    }

    public function map($table): array
    {
        return [
            $table->pengampu->matakuliah->jurusan->nama,
            $table->pengampu->matakuliah->nama,
            $table->pengampu->matakuliah->kode_mk,
            $table->pengampu->matakuliah->semester,
            $table->pengampu->kelas,
            $table->slotjam->hari->nama,
            $table->slotjam->awal,
            $table->slotjam->akhir,
            $table->ruangan->nama,
            $table->pengampu->dosen->nama,
        ];
    }
}
