<?php

namespace Database\Seeders;

use App\Models\matakuliah;
use Illuminate\Database\Seeder;

class MatakuliahSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        foreach ($this->data() as $key => $value) {
            matakuliah::create([
                'nama'=>$value[0],
                'kode_mk'=>'kode'.$key,
                'id_jurusan'=>$value[3],
                'semester'=>$value[1],
                'sks'=>$value[2],
                'kategori'=>'teori',
            ]);
        };
    }


    public function data()
    {
        return [
            ["Akhlak Tasawuf",1,2,3],
            ["Akhlak Tasawuf",1,2,1],
            ["Akhlak Tasawuf",1,2,4],
            ["Akuntansi Biaya",5,3,4],
            ["Akuntansi Biaya",5,2,4],
            ["Akuntansi Keuangan Desa",5,3,3],
            ["Akuntansi Keuangan Lanjutan I",5,3,3],
            ["Akuntansi Keuangan Menengah I",3,3,3],
            ["Akuntansi Manajemen",5,3,3],
            ["Akuntansi Pesantren",3,3,3],
            ["Akuntansi Sektor Publik",5,3,1],
            ["Akuntansi Syariah",3,3,3],
            ["Akuntansi Syariah",3,3,4],
            ["Akuntansi Syariah",3,2,2],
            ["Al-Qur'an Hadist",1,3,2],
            ["Analisis Kelayakan Pembiayaan Bank Syariah",5,2,2],
            ["Analisis Kelayakan Pembiayaan Bank Syariah",5,3,2],
            ["Analisis Laporan Keuangan",5,3,4],
            ["Analisis laporan Keuangan Bank Syariah",5,3,2],
            ["Aspek Hukum Bank syariah",3,2,2],
            ["Bahasa Arab",1,2,1],
            ["Bahasa Arab",1,2,4],
            ["Bahasa Arab",1,2,2],
            ["Bahasa Arab 1",1,2,3],
            ["Bahasa Indonesia",1,2,2],
            ["Bahasa Inggris",1,2,1],
            ["Bahasa Inggris",1,2,4],
            ["Bahasa Inggris",1,2,2],
            ["Bahasa Inggris 1",1,2,3],
            ["Bank dan Lembaga Keuangan Lainnya",3,3,4],
            ["E-Commerce*",5,3,1],
            ["Ekonometrika",5,3,1],
            ["Ekonomi Internasional",5,3,1],
            ["Ekonomi Koperasi dan UMKM",5,3,1],
            ["Ekonomi Makro Islam",3,3,2],
            ["Ekonomi Manjerial",3,3,2],
            ["Ekonomi Mikro Islam",3,3,2],
            ["Ekonomi Publik",5,3,1],
            ["Etika Bisnis Islam",3,3,1],
            ["Etika bisnis Islam",3,2,4],
            ["Etika Bisnis Perbankan Syariah",5,2,2],
            ["Filsafat Ilmu",1,2,1],
            ["Fiqh Muamalah",1,2,2],
            ["Fiqih/Usul Fiqih",1,2,1],
            ["Fiqih/Usul Fiqih",1,2,2],
            ["Ilmu Kalam",3,2,1],
            ["Investasi dan Pasar Modal Syariah",5,3,1],
            ["Islam dan Budaya Lokal",1,2,3],
            ["Islam dan Budaya Lokal",1,2,1],
            ["Islam dan Budaya Lokal",1,2,4],
            ["Kewirausahaan",1,2,3],
            ["Kewirausahaan",1,2,4],
            ["Manajemen Investasi dan Risiko",5,3,2],
            ["Manajemen Keuangan Sektor Publik",5,3,4],
            ["Manajemen Keuangan Syariah",3,3,3],
            ["Manajemen Keuangan Syariah",3,3,2],
            ["Manajemen Keuangan Syariah I",3,3,4],
            ["Manajemen Pemasaran Bank syariah",5,2,2],
            ["Manajemen Portofolio Dan Pasar Modal",5,3,3],
            ["MANAJEMEN PORTOFOLIO DAN PASAR MODAL",5,3,4],
            ["Manajemen SISWAF",5,3,4],
            ["Manajemen Sumber Daya Insani",3,2,3],
            ["Matematika Ekonomi",3,2,3],
            ["Matematika Ekonomi",3,3,4],
            ["Matematika Ekonomi",3,3,2],
            ["Matematika Ekonomi Lanjutan",3,3,1],
            ["Metode Penelitian",5,3,4],
            ["Metode Penelitian Perbankan Syariah",5,3,2],
            ["Metodologi Penelitian",5,3,3],
            ["Metodologi Penelitian",5,3,4],
            ["Metodologi Studi Islam",3,2,3],
            ["Metodologi Studi Islam",3,2,1],
            ["Metodologi Studi Islam",3,2,4],
            ["Pendidikan Pancasila dan Kewarganegaraan",1,3,3],
            ["Pendidikan Pancasila dan Kewarganegaraan",1,3,1],
            ["Pendidikan Pancasila dan Kewarganegaraan",1,3,4],
            ["Pendidikan Pancasila dan Kewarganegaraan",1,3,2],
            ["Pengantar  Ilmu Ekonomi",1,2,1],
            ["Pengantar Akuntansi",1,3,1],
            ["Pengantar Akuntansi",1,2,4],
            ["Pengantar Akuntansi",1,3,2],
            ["Pengantar Akuntansi 1",1,2,3],
            ["Pengantar Audit",5,3,3],
            ["Pengantar Ekonomi Makro",3,2,3],
            ["Pengantar Ekonomi Makro Islam",3,2,1],
            ["Pengantar Manajemen",1,2,3],
            ["Pengantar Manajemen",1,2,1],
            ["Pengantar Manajemen",1,2,4],
            ["Pengantar Manajemen",1,2,2],
            ["Pengantar Mikro Ekonomi Islam",1,2,2],
            ["Pengantar Perbankan Syariah",3,2,2],
            ["Pengembangan Produk Keuangan Islam",3,3,1],
            ["Perpajakan",5,3,3],
            ["Perpajakan",3,2,1],
            ["Perpajakan",5,2,2],
            ["Praktikum Perpajakan",5,3,4],
            ["Sejarah Pemikiran Ekonomi Islam",1,2,4],
            ["Sistem Infomasi Manajemen",3,2,4],
            ["Sistem Informasi Akuntansi",3,3,3],
            ["Sistem Informasi Manajemen",3,3,4],
            ["Sistem Pengendalian Manajemen",5,3,3],
            ["Sistem Pengendalian Manajemen",5,2,4],
            ["Statistika Ekonomi",3,3,1],
            ["Statistika Lanjutan",5,3,2],
            ["Studi Kelayakan Bisnis",3,2,2],
            ["Tafsir Ayat dan Hadist Ekonomi",3,2,1],
            ["Teori Pengambilan Keputusan",5,2,4],
            ["Ushul Fiqhi",1,2,3],
            ["Ushul Fiqhi",1,2,4],
        ];
    }
}
