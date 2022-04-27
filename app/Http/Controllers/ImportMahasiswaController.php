<?php

namespace App\Http\Controllers;

use App\Imports\MahasiswaImport;
use App\Models\jurusan;
use Illuminate\Http\Request;

class ImportMahasiswaController extends Controller
{
    public function index()
    {
        return view('import.import-mahasiswa',[
            'jurusan'=>jurusan::all(),
        ]);
    }

    public function store(Request $request)
    {
        $file =$request->file('mahasiswabaru');

        $import=new MahasiswaImport;
        $collection=$import->import($file);// null, \Maatwebsite\Excel\Excel::XLSX
        
        return redirect()->route('import.mahasiswa')->with('info','berhasil mengimport..');
    }
}
