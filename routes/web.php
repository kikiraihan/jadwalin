<?php


use App\Http\Controllers\ImportDosenController;
use App\Http\Controllers\ImportMahasiswaController;
use App\Http\Controllers\ImportMatakuliahController;
use App\Http\Livewire\DosenIndex;
use App\Http\Livewire\HariAdd;
use App\Http\Livewire\HariIndex;
use App\Http\Livewire\JurusanAdd;
use App\Http\Livewire\JurusanEdit;
use App\Http\Livewire\JurusanIndex;
use App\Http\Livewire\Mahasiswa;
use App\Http\Livewire\MatakuliahAdd;
use App\Http\Livewire\MatakuliahEdit;
use App\Http\Livewire\MatakuliahIndex;
use App\Http\Livewire\Pembimbingan;
use App\Http\Livewire\PengampuAdd;
use App\Http\Livewire\PengampuImport;
use App\Http\Livewire\PengampuIndex;
use App\Http\Livewire\RuanganAdd;
use App\Http\Livewire\RuanganEdit;
use App\Http\Livewire\RuanganIndex;
use App\Http\Livewire\SlotJadwalAdd;
use App\Http\Livewire\SlotJadwalIndex;
use App\Http\Livewire\SlotJamAdd;
use App\Http\Livewire\SlotJamEdit;
use App\Http\Livewire\SlotJamIndex;
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
        $admin->get('pembimbing', Pembimbingan::class)->name('pembimbingan');
        $admin->get('dosen', DosenIndex::class)->name('dosen');
        $admin->get('mahasiswa', Mahasiswa::class)->name('mahasiswa');
        
        $admin->get('dosen/import', [ImportDosenController::class,'index'])->name('import.dosen');
        $admin->post('dosen/import/store', [ImportDosenController::class,'store'])->name('import.dosen.store');
        $admin->get('mahasiswa/import', [ImportMahasiswaController::class,'index'])->name('import.mahasiswa');
        $admin->post('mahasiswa/import/store', [ImportMahasiswaController::class,'store'])->name('import.mahasiswa.store');
        $admin->get('matakuliah/import', [ImportMatakuliahController::class,'index'])->name('import.matakuliah');
        $admin->post('matakuliah/import/store', [ImportMatakuliahController::class,'store'])->name('import.matakuliah.store');
        
        $admin->get('jurusan', JurusanIndex::class)->name('jurusan');
        $admin->get('jurusan/add', JurusanAdd::class)->name('jurusan.add');
        $admin->get('jurusan/{id}/edit', JurusanEdit::class)->name('jurusan.edit');
        $admin->get('matakuliah', MatakuliahIndex::class)->name('matakuliah');
        $admin->get('matakuliah/add', MatakuliahAdd::class)->name('matakuliah.add');
        $admin->get('matakuliah/{id}/edit', MatakuliahEdit::class)->name('matakuliah.edit');
        $admin->get('ruangan', RuanganIndex::class)->name('ruangan');
        $admin->get('ruangan/add', RuanganAdd::class)->name('ruangan.add');
        $admin->get('ruangan/{id}/edit', RuanganEdit::class)->name('ruangan.edit');
        $admin->get('hari', HariIndex::class)->name('hari');
        $admin->get('hari/add', HariAdd::class)->name('hari.add');
        $admin->get('pengampu', PengampuIndex::class)->name('pengampu');
        $admin->get('pengampu/add', PengampuAdd::class)->name('pengampu.add');
        $admin->get('pengampu/import', PengampuImport::class)->name('pengampu.import');
        $admin->get('slotjam', SlotJamIndex::class)->name('slotjam');
        $admin->get('slotjam/add', SlotJamAdd::class)->name('slotjam.add');
        $admin->get('slotjam/{id}/edit', SlotJamEdit::class)->name('slotjam.edit');
        $admin->get('penjadwalan', SlotJadwalIndex::class)->name('slotjadwal');
        $admin->get('penjadwalan/{id_slot_jam}/add', SlotJadwalAdd::class)->name('slotjadwal.add');
    });


});






Route::get('coba', function () {
    return view('swalForm.editDosen');
})->name('coba');

require __DIR__.'/auth.php';
