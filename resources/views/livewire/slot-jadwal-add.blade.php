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

        <h1 class="text-3xl text-black pb-4">Tambah Slot Jadwal</h1>
        <section class="w-full">
            
            <div class="bg-white overflow-auto mb-6 py-3 px-6 rounded">

                <div class="flex border-b border-40">
                    <div class="w-1/4 py-4">
                        <h4 class="font-normal text-80">Slot Jam</h4>
                    </div> 
                    <div class="w-3/4 py-4 break-words">
                        <div>
                            {{$slotJam->hari->nama}}
                        </div>
                        <div>
                            {{$slotJam->awal}}-{{$slotJam->akhir}}
                        </div>
                        <x-atom.form-error-input :kolom="'id_slot_jam'" />
                    </div>
                </div>

                <div class="flex border-b border-40">
                    <div class="w-1/4 py-4">
                        <h4 class="font-normal text-80">Pengampu :</h4>
                        @if ($dipilihPengampu)
                            <div class="bg-blue-200 text-md px-3 py-2 rounded">
                                <div class="inline-flex flex-col">
                                    <span class="text-xs mt-2">Dosen : </span>
                                    <span>{{$dipilihPengampu->dosen->nama}}</span>
                                    <span class="text-xs mt-2">Matakuliah : </span>
                                    <span>{{$dipilihPengampu->matakuliah->nama}}</span>
                                    <span class="text-xs mt-2">Kelas : </span>
                                    <span>{{$dipilihPengampu->kelas}}</span>
                                </div>
                                
                            </div>
                        @endif
                    </div> 
                    <div class="w-3/4 py-4 break-words">
                        
                        <div class="flex p-2 space-x-1 col-span-2">
                            <button class="w-auto flex justify-end items-center text-gray-500 p-2 hover:text-gray-400">
                                <i class="fas fa-search mr-3"></i>
                            </button>
                            <x-atom.form-input-standar placeholder="Search" type="text" wire:model.debounce.500ms="search_pengampu" class="w-full rounded p-2" />
                        </div>
                        @if ($peng->isEmpty())
                            <x-atom.empty-table/>
                        @else
                            <ul class="pr-6 pl-14 divide-y-2 divide-gray-50">
                                @foreach ($peng as $pe)
                                <li class="py-3 space-x-3 flex">
                                    <div wire:click="pilihPengampu({{json_encode($pe->id)}})" 
                                        class="bg-sky-200  px-3 py-1 rounded cursor-pointer hover:bg-sky-300 shadow">
                                        <i class="fas fa-chalkboard-teacher text-sm pr-1"></i>
                                        <div class="inline-flex divide-x-2 divide-sky-100 space-x-2">
                                            <span class="pl-2">{{$pe->dosen->nama}}</span>
                                            <span class="pl-2">{{$pe->matakuliah->nama}}</span>
                                            <span class="pl-2">{{$pe->kelas}}</span>
                                        </div>
                                    </div>
                                </li>     
                                @endforeach
                            </ul>
                        @endif

                        <div class="px-3 py-2">
                            {{ $peng->links() }}
                        </div>

                        <x-atom.form-error-input :kolom="'id_pengampu'" />
                    </div>
                </div>

                <div class="flex border-b border-40">
                    <div class="w-1/4 py-4">
                        <h4 class="font-normal text-80">Ruangan :</h4>
                        @if ($dipilihRuangan)
                            <div class="bg-blue-200 text-md px-3 py-2 rounded">
                                <span>{{$dipilihRuangan->nama}}</span>
                            </div>
                        @endif
                    </div> 
                    <div class="w-3/4 py-4 break-words">
                        
                        <div class="flex p-2 space-x-1 col-span-2">
                            <button class="w-auto flex justify-end items-center text-gray-500 p-2 hover:text-gray-400">
                                <i class="fas fa-search mr-3"></i>
                            </button>
                            <x-atom.form-input-standar placeholder="Search" type="text" wire:model.debounce.500ms="search_ruangan" class="w-full rounded p-2" />
                        </div>
                        @if ($ru->isEmpty())
                            <x-atom.empty-table/>
                        @else
                            <ul class="pr-6 pl-14 divide-y-2 divide-gray-50">
                                @foreach ($ru as $r)
                                <li class="py-3 space-x-3 flex">
                                    <div wire:click="pilihRuangan({{json_encode($r->id)}})" 
                                        class="bg-blue-200  px-3 py-1 rounded cursor-pointer hover:bg-blue-300 shadow">
                                        <i class="fas fa-school text-sm pr-1"></i>
                                        <span>{{$r->nama}}</span>
                                    </div>
                                </li>     
                                @endforeach
                            </ul>
                        @endif

                        <div class="px-3 py-2">
                            {{ $ru->links() }}
                        </div>

                        <x-atom.form-error-input :kolom="'id_ruangan'" />
                    </div>
                </div>

                <div wire:loading.delay.long wire:target='save'>
                    <x-atom.loading_fullpage-image  />
                </div>

            </div>

            <div class="flex justify-end space-x-2">
                <x-atom.button-link class="p-2" :color="'zinc'"
                href="{{ route('slotjadwal') }}">
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
