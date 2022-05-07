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

        <h1 class="text-3xl text-black pb-4">Tambah Pengampu</h1>
        <section class="w-full">
            
            <div class="bg-white overflow-auto mb-6 py-3 px-6 rounded">


                <div class="flex border-b border-40">
                    <div class="w-1/4 py-4">
                        <h4 class="font-normal text-80">Matakuliah :</h4>
                        @if ($dipilihMatakuliah)
                            <div class="bg-blue-200 text-md px-3 py-2 rounded space-y-2">
                                <div>{{$dipilihMatakuliah->nama}}</div>
                                <div class="space-x-2 flex text-xs">
                                    <span> {{$dipilihMatakuliah->kode_mk}}</span>
                                    <span> Semester {{$dipilihMatakuliah->semester}}</span>
                                    <span class="text-lime-700"> Jurusan {{$dipilihMatakuliah->jurusan->namaSingkat}}</span>
                                    <span> {{$dipilihMatakuliah->sks}} sks</span>
                                </div>
                            </div>
                        @endif
                    </div> 
                    <div class="w-3/4 py-4 break-words">
                        
                        <div class="flex p-2 space-x-1 col-span-2">
                            <button class="w-auto flex justify-end items-center text-gray-500 p-2 hover:text-gray-400">
                                <i class="fas fa-search mr-3"></i>
                            </button>
                            <x-atom.form-input-standar placeholder="Search" type="text" wire:model.debounce.500ms="searchMatakuliah" class="w-full rounded p-2" />
                        </div>
                        @if ($mk->isEmpty())
                            <x-atom.empty-table/>
                        @else
                            <ul class="pr-6 pl-14 divide-y-2 divide-gray-50">
                                @foreach ($mk as $m)
                                <li class="py-3 space-x-3 flex">
                                    <div wire:click="pilihMatakuliah({{json_encode($m->id)}})" 
                                        class="bg-blue-200 px-2 py-1 rounded cursor-pointer hover:bg-blue-300 shadow flex items-center space-x-2">
                                        <i class="fas fa-angle-right"></i>
                                        <span>
                                            <div>{{$m->nama}}({{$m->jurusan->namaSingkat}})</div>
                                            <div class="space-x-2">
                                                <sup> semester {{$m->semester}}</sup>
                                                <sup class="text-lime-700"> Jurusan {{$m->jurusan->namaSingkat}}</sup>
                                                <sup> {{$m->sks}} sks</sup>
                                            </div>
                                        </span>
                                    </div>
                                </li>     
                                @endforeach
                            </ul>
                        @endif

                        <div class="px-3 py-2">
                            {{ $mk->links() }}
                        </div>

                        <x-atom.form-error-input :kolom="'id_matakuliah'" />
                    </div>
                </div>


                <div class="flex border-b border-40">
                    <div class="w-1/4 py-4">
                        <h4 class="font-normal text-80">Dosen :</h4>
                        @if ($dipilihDosen)
                            <div class="bg-blue-200 text-md px-3 py-2 rounded">
                                <span>{{$dipilihDosen->nama}}</span>
                            </div>
                        @endif
                    </div> 
                    <div class="w-3/4 py-4 break-words">
                        
                        <div class="flex p-2 space-x-1 col-span-2">
                            <button class="w-auto flex justify-end items-center text-gray-500 p-2 hover:text-gray-400">
                                <i class="fas fa-search mr-3"></i>
                            </button>
                            <x-atom.form-input-standar placeholder="Search" type="text" wire:model.debounce.500ms="searchDosen" class="w-full rounded p-2" />
                        </div>
                        @if ($do->isEmpty())
                            <x-atom.empty-table/>
                        @else
                            <ul class="pr-6 pl-14 divide-y-2 divide-gray-50">
                                @foreach ($do as $d)
                                <li class="py-3 space-x-3 flex">
                                    <div wire:click="pilihDosen({{json_encode($d->id)}})" 
                                        class="bg-blue-200  px-3 py-1 rounded cursor-pointer hover:bg-blue-300 shadow">
                                        <i class="fas fa-user-graduate text-sm pr-1"></i>
                                        <span>{{$d->nama}}</span>
                                    </div>
                                </li>     
                                @endforeach
                            </ul>
                        @endif

                        <div class="px-3 py-2">
                            {{ $do->links() }}
                        </div>

                        <x-atom.form-error-input :kolom="'id_dosen'" />
                    </div>
                </div>


                <div class="flex border-b border-40">
                    <div class="w-1/4 py-4">
                        <h4 class="font-normal text-80">Penanggung Jawab</h4>
                    </div> 
                    <div class="w-3/4 py-4 break-words">
                        <x-atom.form-select-standar wire:model="peng.penanggung_jawab">
                            <option value="" hidden selected>...</option>
                            <option class="w-full capitalize" value="1">ya</option>
                            <option class="w-full capitalize" value="0">tidak</option>
                        </x-atom.form-select-standar>
                        <x-atom.form-error-input :kolom="'peng.penanggung_jawab'" />
                    </div>
                </div>

                <div class="flex border-b border-40">
                    <div class="w-1/4 py-4">
                        <h4 class="font-normal text-80">Kelas</h4>
                    </div> 
                    <div class="w-3/4 py-4 break-words">
                        <x-atom.form-select-standar wire:model="peng.kelas">
                            <option value="" hidden selected>...</option>
                            <option class="w-full capitalize" value="A">A</option>
                            <option class="w-full capitalize" value="B">B</option>
                            <option class="w-full capitalize" value="C">C</option>
                            <option class="w-full capitalize" value="D">D</option>
                            <option class="w-full capitalize" value="E">E</option>
                        </x-atom.form-select-standar>
                        <x-atom.form-error-input :kolom="'peng.kelas'" />
                    </div>
                </div>

                <div wire:loading.delay.long wire:target='save'>
                    <x-atom.loading_fullpage-image  />
                </div>

            </div>

            <div class="flex justify-end space-x-2">
                <x-atom.button-link class="p-2" :color="'zinc'"
                href="{{ route('pengampu') }}">
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
