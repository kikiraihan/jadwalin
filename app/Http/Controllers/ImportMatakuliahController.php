<?php

namespace App\Http\Controllers;

use App\Imports\MatakuliahImport;
use App\Models\jurusan;
use Illuminate\Http\Request;

class ImportMatakuliahController extends Controller
{
    public function index()
    {
        return view('import.import-matakuliah',[
            'jurusan'=>jurusan::all(),
        ]);
    }

    public function store(Request $request)
    {
        $file =$request->file('matakuliahbaru');

        $import=new MatakuliahImport;
        $collection=$import->import($file);// null, \Maatwebsite\Excel\Excel::XLSX
        
        return redirect()->route('import.matakuliah')->with('info','berhasil mengimport..');
    }
}
