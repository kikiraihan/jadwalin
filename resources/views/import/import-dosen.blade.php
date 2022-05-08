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
                    Import Dosen Baru
                </div>

                <x-atom.button-with-google-icon href="{{ route('dosen') }}" :icon="'arrow_back'"
                    class="hover:text-blue-700">
                    <span class="d-none d-md-inline">Kembali</span>
                </x-atom.button-with-google-icon>
            </div>


            <div class="bg-white rounded shadow-md p-2 my-3">
                <form action="{{ route('import.dosen.store') }}" method="POST" class="grid md:grid-cols-3 gap-8" enctype="multipart/form-data">{{-- <form wire:submit.prevent="import" class="grid md:grid-cols-2 gap-8" enctype="multipart/form-data"> --}}
                    @csrf
                    <div class="space-y-2">
                        
                        <div class="text-left space-y-1">
                            <label class="f-roboto ml-1 text-gray-500 text-sm block">Upload template (.xlsx)</label>
                            <input type="file" name="dosenbaru" class="shadow text-sm border-none p-2 w-full rounded focus:outline-none focus:ring-2 focus:ring-blue-300 placeholder-gray-300">
                            @error('dosenbaru') <span class="error">{{ $message }}</span> @enderror
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
                            <x-atom.button-with-google-icon href="{{ asset('_keperluan_import/dosen_import.xlsx') }}" :icon="'download'" class="bg-gray-100 shadow-sm text-gray-500  inline-flex p-2 rounded cursor-pointer   hover:shadow-md  hover:text-gray-600">
                                template.xlsx
                            </x-atom.button-with-google-icon>
                        </div>

                        <div>Keterangan</div>
                        <div class="border border-1 text-justify py-2 px-4">
                            <span class="text-sm">Template ini memiliki kolom-kolom dengan ketentuan sebagai berikut :</span>
                            <ul class="list-disc list-inside text-sm space-y-3">
                                <li>
                                    <b>NAMA</b>,<br>
                                    Berisi nama lengkap, mohon untuk diisikan dengan nama asli yang benar.
                                </li>
                                <li>
                                    <b>NIP</b>,<br>
                                    Berisi NIP dosen.
                                </li>
                                <li>
                                    <b>BIDANG STUDI</b>,<br>
                                    <span>Bidang studi dari dosen</span>
                                </li>
                            </ul>
                        </div>

                        
                    </div>
                </form>
            </div>

        </div>
    </div>
</x-app-layout>