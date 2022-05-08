<x-app-layout>
    <x-slot name="header">
        @include('layouts.navigation',['warna'=>'bg-white'])
    </x-slot>

    <x-slot name="footer">
    </x-slot>
    <x-slot name="stylehalaman">
    </x-slot>
    <x-slot name="scripthalaman">
        @include('layouts.scriptsweetalert')
    </x-slot>

    {{--------------------------------------------------------------------------------}}

    <div>

        <div id="atas" class="container mx-auto bg-gray-100 mb-28">

            <div class="flex justify-between items-center mt-6">
                <div class="f-playfair font-bold text-2xl capitalize">
                    Import Matakuliah Baru
                </div>

                <x-atom.button-with-google-icon href="{{ route('matakuliah') }}" :icon="'arrow_back'"
                    class="hover:text-blue-700">
                    <span class="d-none d-md-inline">Kembali</span>
                </x-atom.button-with-google-icon>
            </div>


            <div class="bg-white rounded shadow-md p-2 my-3">
                <form action="{{ route('import.matakuliah.store') }}" method="POST" class="grid md:grid-cols-3 gap-8" enctype="multipart/form-data">{{-- <form wire:submit.prevent="import" class="grid md:grid-cols-2 gap-8" enctype="multipart/form-data"> --}}
                    @csrf
                    <div class="space-y-2">
                        
                        <div class="text-left space-y-1">
                            <label class="f-roboto ml-1 text-gray-500 text-sm block">Upload template (.xlsx)</label>
                            <input type="file" name="matakuliahbaru" class="shadow text-sm border-none p-2 w-full rounded focus:outline-none focus:ring-2 focus:ring-blue-300 placeholder-gray-300">
                            @error('matakuliahbaru') <span class="error">{{ $message }}</span> @enderror
                        </div>

                        <x-atom.button-standar :tipe="'submit'" class="bg-green-200 shadow-sm text-green-500  inline-flex p-2 rounded cursor-pointer hover:shadow-md ">
                            Proses
                        </x-atom.button-standar>

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
                            <x-atom.button-with-google-icon href="{{ asset('_keperluan_import/matakuliah_import_2.xlsx') }}" :icon="'download'" class="bg-gray-100 shadow-sm text-gray-500  inline-flex p-2 rounded cursor-pointer   hover:shadow-md  hover:text-gray-600">
                                template_matakuliah.xlsx
                            </x-atom.button-with-google-icon>
                        </div>

                        <div class="border border-1 text-justify py-2 px-4">
                            <div class="text-2xl">Keterangan</div>
                            <span class="text-sm">
                                <div class="inline-block mt-3 bg-amber-100 p-2 text-sm mb-2">
                                    Silahkan download template, dan isi dengan data yang akan di import. 
                                </div>
                                <div>Template ini memiliki kolom-kolom dengan ketentuan sebagai berikut :</div>
                            </span>
                            <ul class="list-disc list-outside text-sm px-5">
                                <li>
                                    <b>NAMA</b>,<br>
                                    Diisi dengan nama matakuliah.
                                </li>
                                <li>
                                    <b>SEMESTER</b>,<br>
                                    Diisi dengan semester matakuliah.
                                </li>
                                <li>
                                    <b>SKS</b>,<br>
                                    Diisi dengan sks matakuliah.
                                </li>
                                <li>
                                    <b>JURUSAN</b>,<br>
                                    <span>
                                        Jurusan hanya bisa diisi dengan nama jurusan dan menggunakan huruf besar di setiap awal kata, misalnya :
                                    </span>
                                    <ul class="list-disc list-inside ml-4">
                                        @foreach ($jurusan as $item)
                                            <li>{{$item->nama}}</li>
                                        @endforeach
                                    </ul>
                                </li>
                                <li>
                                    <b>KODEMK</b>,<br>
                                    Diisi dengan kode matakuliah.
                                </li>
                                <li>
                                    <b>KATEGORI</b>,<br>
                                    <span>
                                        Diisi dengan kategori matakuliah, misalnya :
                                    </span>
                                    <ul class="list-disc list-inside ml-4">
                                        <li>Teori</li>
                                        <li>Praktek</li>
                                    </ul>
                                </li>
                            </ul>
                        </div>

                        
                    </div>
                </form>
            </div>

        </div>
    </div>
</x-app-layout>