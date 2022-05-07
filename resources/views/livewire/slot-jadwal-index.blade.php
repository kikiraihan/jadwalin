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


<div id="atas" class="container mx-auto bg-gray-100 mb-28">

    <div class="flex justify-between items-center mt-6">
        <div>
            <div class="f-playfair font-bold text-2xl capitalize">
                Penjadwalan
            </div>
            <span class="text-sm">
                Pengaturan slot jadwal kuliah berdasarkan slot jam yang tersedia.
            </span>
        </div>
        <div wire:loading.delay.long>
            <x-atom.loading_fullpage-spin  />
        </div>
    </div>
    
    <div class="my-6 overflow-x-auto">

        <div class="grid grid-cols-4 items-center mb-4">
            <div class="flex p-2 space-x-1 col-span-1 items-center">
                <x-atom.form-select-standar wire:model="filterIdHari">
                    <option value="" selected>Semua Hari</option>
                    @foreach ($hari as $item)
                        <option class="w-full capitalize" value='{{$item->id}}'>
                            {{$item->nama}}
                        </option>
                    @endforeach
                </x-atom.form-select-standar>
            </div>

            <div class="col-span-3 pr-2 py-2 flex justify-end space-x-4">
                <x-atom.button-table-with-faicon icon="fas fa-recycle" warna="blue" class="px-2 py-1 float-right" wire:click="$emit('swalAndaYakinCeklis','FixGenerateJadwal','Anda akan menghapus semua slot jadwal lama dan menggenerate jadwal baru, anda yakin?')">
                    <span class="font-semibold text-sm">Generate Jadwal</span>
                </x-atom.button-table-with-faicon>

                <x-atom.button-table-with-faicon icon="fas fa-file-excel" warna="green" class="px-2 py-1 float-right" wire:click="downloadExcell">
                    <span class="font-semibold text-sm">Download Excell</span>
                </x-atom.button-table-with-faicon>

                <x-atom.button-table-with-faicon icon="fas fa-trash" warna="red" class="px-2 py-1 float-right" wire:click="$emit('swalToDeleted','FixHapusSemuaJadwal')">
                    <span class="font-semibold text-xs">Hapus Semua</span>
                </x-atom.button-table-with-faicon>
            </div>
        </div>
        

        <div class="grid grid-cols-{{count($isiTabel)}} gap-4">
            @foreach ($isiTabel as $idHari=> $item)
                <div class="flex flex-col space-y-2 px-2">
                    <div class="capitalize">
                        {{$item[0]->hari->nama}}
                    </div>
                    @foreach ($item as $jam)
                        <div class="bg-slate-50 rounded shadow">
                            <div class="text-xs flex justify-between ">
                                <span class="bg-slate-200 p-1 rounded-br-md shadow-sm">{{$jam->awal}} - {{$jam->akhir}}</span> 
                                <span class="bg-amber-100 p-1 rounded-bl-md shadow-sm">{{$jam->sks}} SKS</span>
                            </div>
                            <div class="mb-3 py-2">
                                @forelse ($jam->slotJadwal as $jad)
                                <div class="py-1 px-2 border-b-2 border-zinc-100 bg-white">
                                    <div class="text-sm font-semibold flex justify-between">
                                        <span>{{$jad->pengampu->matakuliah->nama}}</span>
                                        <span>
                                            <x-atom.button-table-only-faicon icon="fas fa-xmark" warna="pink" class="ml-2 px-2 py-1 float-right" wire:click="$emit('swalToDeleted','FixHapusJadwal',{{$jad->id}})"/>
                                        </span>
                                    </div>
                                    <div class="text-xs">
                                        <i class="fas fa-user-graduate text-xs pr-1 text-slate-600"></i>
                                        <span>{{$jad->pengampu->dosen->nama}}</span>
                                    </div>
                                    <div class="w-full flex text-xs justify-between">
                                        <div class="flex-initial">
                                            <i class="fas fa-building text-xs pr-1 text-slate-600"></i>
                                            <span>{{$jad->ruangan->nama}}</span>
                                        </div>
                                        <div class="inline-flex space-x-2">
                                            <span class="text-xs">
                                                {{$jad->pengampu->matakuliah->jurusan->namaSingkat}} 
                                            </span>
                                            <span class="text-xs">
                                                {{-- <sup>sem </sup>  --}}
                                                {{$jad->pengampu->matakuliah->semester}} 
                                            </span>
                                            <span class="text-xs">
                                                {{-- <sup>kls </sup>  --}}
                                                {{$jad->pengampu->kelas}}
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                @empty
                                    <x-atom.empty-card/>
                                @endforelse
                            </div>
                            <div class="w-full flex p-1 justify-center">
                                <x-atom.button-link href="{{ route('slotjadwal.add', ['id_slot_jam'=>$jam->id]) }}" color="emerald" class="px-2 py-1 mb-1">
                                    Tambah
                                </x-atom.button-link>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endforeach
        </div>

    </div>

</div>
<br>