<x-slot name="header">
    @include('layouts.navigation',['warna'=>'bg-white'])
</x-slot>

<x-slot name="footer">
    @include('layouts.footer')
</x-slot>

<x-slot name="stylehalaman">
    @livewireStyles
</x-slot>
<x-slot name="scripthalaman">
    @livewireScripts
    @include('layouts.scriptsweetalert')
</x-slot>

{{--------------------------------------------------------------------------------}}

<div>

    <div id="atas" class="container mx-auto bg-gray-100 mb-28">

        <div class="flex justify-between items-center mt-6">
            <div class="f-playfair font-bold text-2xl capitalize">
                Import Pengampu
            </div>

            <x-atom.button-with-google-icon href="{{ route('pengampu') }}" :icon="'arrow_back'"
                class="hover:text-blue-700">
                <span class="d-none d-md-inline">Kembali</span>
            </x-atom.button-with-google-icon>
        </div>


        <div class="bg-white rounded shadow-md p-2 my-3">
            <form action="{{ route('import.matakuliah.store') }}" method="POST" class="grid md:grid-cols-3 gap-8" enctype="multipart/form-data">{{-- <form wire:submit.prevent="import" class="grid md:grid-cols-2 gap-8" enctype="multipart/form-data"> --}}
                @csrf
                <div class="space-y-2">
                    
                    <div>tinggal disini yang importnya belum dibuat, file import juga belum.</div>

                    {{-- <div class="text-left space-y-1">
                        <label class="f-roboto ml-1 text-gray-500 text-sm block">Upload template (.xlsx)</label>
                        <input type="file" name="matakuliahbaru" class="shadow text-sm border-none p-2 w-full rounded focus:outline-none focus:ring-2 focus:ring-blue-300 placeholder-gray-300">
                        @error('matakuliahbaru') <span class="error">{{ $message }}</span> @enderror
                    </div>

                    <x-atom.button-standar :tipe="'submit'" class="bg-green-200 shadow-sm text-green-500  inline-flex p-2 rounded cursor-pointer hover:shadow-md ">
                        Proses
                    </x-atom.button-standar> --}}

                    {{-- menampilkan error validasi --}}
                    @if (count($errors) > 0)
                    <br>
                    <div class="bg-yellow-100 p-2 text-justify rounded">
                        <ul class="list-disc list-inside text-sm">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif

                    {{-- menampilkan notif sukses--}}
                    @if ($message = Session::get('info'))
                    <div class="bg-green-100 p-2 text-justify rounded">
                        <span class="text-sm">{{ $message }}</span>
                    </div>
                    @endif

                </div>


                <div class="space-y-2 col-span-2">
                    <div class="text-left">
                        <label class="f-roboto ml-1 text-gray-500 text-sm block">Template</label>
                        <div class="grid grid-cols-3 items-center">
                            <div class="text-left col-span-2 pr-2 flex space-x-1">
                                <x-atom.form-select-standar wire:model="filterIdJurusan">
                                    @foreach ($jurusan as $item)
                                        <option class="w-full capitalize" value='{{$item->id}}'>
                                            {{$item->nama}}
                                        </option>
                                    @endforeach
                                </x-atom.form-select-standar>
                                <x-atom.form-select-standar wire:model="filterSemester">
                                    @for ($i = 1; $i <= 8; $i++)
                                    <option class="w-full capitalize" value='{{$i}}'>Semester {{$i}}</option>
                                    @endfor
                                </x-atom.form-select-standar>
                            </div>
                
                            <div class="text-right col-span-1 pr-2 space-x-2">
                                <x-atom.button-table-with-faicon icon="fas fa-download" warna="green" class="px-2 py-1.5 float-right" wire:click="downloadTemplate">
                                    <span class="font-semibold text-sm">{{$judul_file}}</span>
                                </x-atom.button-table-with-faicon>
                            </div>
                        </div>
                    </div>

                    <div class="border border-1 text-justify py-2 px-4">
                        <div class="text-2xl">Keterangan</div>
                        <span class="text-sm">
                            <div class="inline-block mt-3 bg-amber-100 p-2 text-sm mb-2">
                                Silahkan download template, dan isi dengan data yang akan di import. 
                            </div>
                            <div>Template ini memiliki kolom-kolom dengan ketentuan sebagai berikut :</div>
                        </span>
                        <div class="my-3">
                            <div class="text-lg font-semibold">Kolom yang tidak boleh diedit</div>
                            <span class="text-sm">ID, JURUSAN, MATAKULIAH, SEMESTER, KODE. KOLOM HANYA AKAN DIPROSES SISTEM.</span>
                        </div>
                        <div class="my-3">
                            <div class="text-lg font-semibold">Kolom yang boleh diedit</div>
                            <ul class="list-disc list-outside text-sm px-5">
                                <li>
                                    <b>DOSEN,</b> <br>
                                    Diisi nama dosen yang akan mengampu matakuliah.
                                </li>
                                <li>
                                    <b>NIP,</b> <br>
                                    Diisi NIP dosen yang akan mengampu matakuliah.
                                </li>
                                <li>
                                    <b>PENANGGUNG JAWAB,</b> <br>
                                    Diisi ya/tidak.
                                </li>
                                <li>
                                    <b>KELAS,</b> <br>
                                    Diisi kelas A/B/C/D/E
                                </li>
                            </ul>
                        </div>
                    </div>

                    
                </div>
            </form>
        </div>

    </div>
</div>