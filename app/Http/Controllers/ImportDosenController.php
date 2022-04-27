<?php

namespace App\Http\Controllers;

use App\Imports\DosenImport;
use App\Models\jurusan;
use Illuminate\Http\Request;

class ImportDosenController extends Controller
{
    public function index()
    {
        return view('import.import-dosen',[
            'jurusan'=>jurusan::all(),
        ]);
    }

    public function store(Request $request)
    {
        $file =$request->file('dosenbaru');

        $import=new DosenImport;
        $collection=$import->import($file);// null, \Maatwebsite\Excel\Excel::XLSX
        
        return redirect()->route('import.dosen')->with('info','berhasil mengimport..');
    }
}
