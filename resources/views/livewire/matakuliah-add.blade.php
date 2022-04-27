<x-slot name="header">
    @include('layouts.navigation')
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

<div class="w-full overflow-x-hidden border-t flex flex-col container mx-auto bg-gray-100 mb-28">
    <main class="w-full flex-grow p-6">

        <h1 class="text-3xl text-black pb-4">Tambah Matakuliah</h1>
        <section class="w-full">
            
            <div class="bg-white overflow-auto mb-6 py-3 px-6 rounded">

                <div class="flex border-b border-40">
                    <div class="w-1/4 py-4">
                        <h4 class="font-normal text-80">Nama</h4>
                    </div> 
                    <div class="w-3/4 py-4 break-words">
                        <x-atom.form-input-standar wire:model="mk.nama" placeholder="nama"/>
                        <x-atom.form-error-input :kolom="'mk.nama'" />
                    </div>
                </div>

                <div class="flex border-b border-40">
                    <div class="w-1/4 py-4">
                        <h4 class="font-normal text-80">Kode MK</h4>
                    </div> 
                    <div class="w-3/4 py-4 break-words">
                        <x-atom.form-input-standar wire:model="mk.kode_mk" placeholder="kode"/>
                        <x-atom.form-error-input :kolom="'mk.kode_mk'" />
                    </div>
                </div>


                <div class="flex border-b border-40">
                    <div class="w-1/4 py-4">
                        <h4 class="font-normal text-80">Jurusan :</h4>
                        @if ($dipilih)
                            <div class="bg-blue-200 text-md px-3 py-2 rounded">
                                <span>{{$dipilih->nama}}</span>
                            </div>
                        @endif
                    </div> 
                    <div class="w-3/4 py-4 break-words">
                        
                        <div class="flex p-2 space-x-1 col-span-2">
                            <button class="w-auto flex justify-end items-center text-gray-500 p-2 hover:text-gray-400">
                                <i class="fas fa-search mr-3"></i>
                            </button>
                            <x-atom.form-input-standar placeholder="Search" type="text" wire:model.debounce.500ms="search" class="w-full rounded p-2" />
                        </div>
                        @if ($jur->isEmpty())
                            <x-atom.empty-table/>
                        @else
                            <ul class="px-6 divide-y-2 divide-gray-100">
                                @foreach ($jur as $m)
                                <li class="py-3 space-x-3 flex">
                                    <div wire:click="pilih({{json_encode($m->id)}})" 
                                        class="bg-blue-200  px-3 py-1 rounded cursor-pointer hover:bg-blue-300 shadow">
                                        <i class="fas fa-envelope text-sm pr-1"></i>
                                        <span>{{$m->nama}}</span>
                                    </div>
                                </li>     
                                @endforeach
                            </ul>
                        @endif

                        <x-atom.form-error-input :kolom="'id_jurusan'" />
                    </div>
                </div>


                <div class="flex border-b border-40">
                    <div class="w-1/4 py-4">
                        <h4 class="font-normal text-80">Semester</h4>
                    </div> 
                    <div class="w-3/4 py-4 break-words">
                        <x-atom.form-select-standar wire:model="mk.semester">
                            <option value="" hidden selected>...</option>
                            @foreach ([
                                '1',
                                '2',
                                '3',
                                '4',
                                '5',
                                '6',
                                '7',
                                '8',
                            ] as $item)
                                <option class="w-full capitalize" value='{{$item}}'>
                                    {{$item}}
                                </option>
                            @endforeach
                        </x-atom.form-select-standar>
                        <x-atom.form-error-input :kolom="'mk.semester'" />
                    </div>
                </div>

                <div class="flex border-b border-40">
                    <div class="w-1/4 py-4">
                        <h4 class="font-normal text-80">Kategori</h4>
                    </div> 
                    <div class="w-3/4 py-4 break-words">
                        <x-atom.form-select-standar wire:model="mk.kategori">
                            <option value="" hidden selected>...</option>
                            @foreach ([
                                'teori',
                                'praktek',
                            ] as $item)
                                <option class="w-full capitalize" value='{{$item}}'>
                                    {{$item}}
                                </option>
                            @endforeach
                        </x-atom.form-select-standar>
                        <x-atom.form-error-input :kolom="'mk.kategori'" />
                    </div>
                </div>

                <div class="flex border-b border-40">
                    <div class="w-1/4 py-4">
                        <h4 class="font-normal text-80">SKS</h4>
                    </div> 
                    <div class="w-3/4 py-4 break-words">
                        <x-atom.form-input-standar wire:model="mk.sks" placeholder="sks" type="number"/>
                        <x-atom.form-error-input :kolom="'mk.sks'" />
                    </div>
                </div>

                <div wire:loading.delay.long wire:target='save'>
                    <x-atom.loading_fullpage-image  />
                </div>

            </div>

            <div class="flex justify-end space-x-2">
                <x-atom.button-link class="p-2" :color="'zinc'"
                href="{{ route('matakuliah') }}">
                    Kembali
                </x-atom.button-link>
                <x-atom.button-manual class="p-2" :color="'emerald'" wire:click="save">
                    Simpan
                </x-atom.button-manual>
            </div>

        </section>

    </main>
</div>
<br>
