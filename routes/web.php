<?php


use App\Http\Controllers\ImportDosenController;
use App\Http\Controllers\ImportMahasiswaController;
use App\Http\Livewire\JurusanAdd;
use App\Http\Livewire\JurusanEdit;
use App\Http\Livewire\JurusanIndex;
use App\Http\Livewire\Mahasiswa;
use App\Http\Livewire\MatakuliahAdd;
use App\Http\Livewire\MatakuliahEdit;
use App\Http\Livewire\MatakuliahIndex;
use App\Http\Livewire\Pembimbingan;
use Illuminate\Support\Facades\Route;



// guest
Route::get('/', function () {
    return redirect()->route('login');
})->name('home');


// admin

Route::group(['middleware' => 'auth'], function ($route) {
    $route->get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    $route->group(['prefix' => 'admin'], function ($admin) {
        $admin->get('dosen', Pembimbingan::class)->name('pembimbingan');
        $admin->get('mahasiswa', Mahasiswa::class)->name('mahasiswa');
        
        $admin->get('dosen/import', [ImportDosenController::class,'index'])->name('import.dosen');
        $admin->post('dosen/import/store', [ImportDosenController::class,'store'])->name('import.dosen.store');
        $admin->get('mahasiswa/import', [ImportMahasiswaController::class,'index'])->name('import.mahasiswa');
        $admin->post('mahasiswa/import/store', [ImportMahasiswaController::class,'store'])->name('import.mahasiswa.store');
        
        $admin->get('jurusan', JurusanIndex::class)->name('jurusan');
        $admin->get('jurusan/add', JurusanAdd::class)->name('jurusan.add');
        $admin->get('jurusan/{id}/edit', JurusanEdit::class)->name('jurusan.edit');
        $admin->get('matakuliah', MatakuliahIndex::class)->name('matakuliah');
        $admin->get('matakuliah/add', MatakuliahAdd::class)->name('matakuliah.add');
        $admin->get('matakuliah/{id}/edit', MatakuliahEdit::class)->name('matakuliah.edit');
    });


});






Route::get('coba', function () {
    return view('swalForm.editDosen');
})->name('coba');

require __DIR__.'/auth.php';
