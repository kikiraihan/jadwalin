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
                Matakuliah
            </div>
            <span class="text-sm">Data matakuliah</span>
        </div>
        <div wire:loading.delay.long>
            <x-atom.loading_fullpage-spin  />
        </div>
    </div>
    
    <div class="bg-white shadow-md rounded my-6 overflow-x-auto">

        <div class="grid grid-cols-4 items-center">
            <div class="flex p-2 space-x-1 col-span-2">
                <button class="w-auto flex justify-end items-center text-gray-500 p-2 hover:text-gray-400">
                    <i class="fas fa-search mr-3"></i>
                </button>
                <x-atom.form-input-standar placeholder="Search" type="text" wire:model.debounce.500ms="search" class="w-full rounded p-2" />
            </div>
            <div class="text-left col-span-1 pr-2">
                <x-atom.form-select-standar wire:model="filterIdJurusan">
                    <option value="" selected>Semua Jurusan</option>
                    @foreach ($jurusan as $item)
                        <option class="w-full capitalize" value='{{$item->id}}'>
                            {{$item->nama}}
                        </option>
                    @endforeach
                </x-atom.form-select-standar>
            </div>

            <div class="text-right col-span-1 pr-2">
                <x-atom.link-table-only-faicon icon="fas fa-plus" 
                    warna="emerald" class="px-2 py-1" 
                    href="{{ route('matakuliah.add') }}"/>
            </div>
        </div>
        

        <table class="min-w-max w-full table-auto">
            
            @if ($isiTabel->isNotEmpty())
            <thead>
                <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                    <th class="py-3 px-4 text-left">No</th>
                    <th class="py-3 px-4 text-left">nama</th>
                    <th class="py-3 px-4 text-left">kode mk</th>
                    <th class="py-3 px-4 text-left">Jurusan</th>
                    <th class="py-3 px-4 text-center">semester</th>
                    <th class="py-3 px-4 text-center">sks</th>
                    <th class="py-3 px-4 text-left">kategori</th>
                    <th class="py-3 px-4 text-right"></th>
                </tr>
            </thead>
            @else
                <x-atom.empty-table/>
            @endif

            <tbody class="text-gray-600 text-sm font-light">

                @foreach ($isiTabel as $item)
                <tr class="border-b border-gray-200 hover:bg-gray-100">
                    <td class="py-3 px-4 text-left whitespace-nowrap">
                        <span class="font-medium">
                            {{ $loop->iteration + $isiTabel->firstItem() - 1 }}
                        </span>
                    </td>
                    <td class="py-3 px-4 text-left whitespace-nowrap">
                        <div class="font-medium w-96 truncate">
                            {{$item->nama}}
                        </div>
                    </td>
                    <td class="py-3 px-4 text-left whitespace-nowrap">{{$item->kode_mk}}</td>
                    <td class="py-3 px-4 text-left whitespace-nowrap">{{$item->jurusan->nama}}</td>
                    <td class="py-3 px-4 text-center whitespace-nowrap">{{$item->semester}}</td>
                    <td class="py-3 px-4 text-center whitespace-nowrap">{{$item->sks}}</td>
                    <td class="py-3 px-4 text-left whitespace-nowrap capitalize">{{$item->kategori}}</td>
                    
                    <td class="text-left py-3 px-4 flex justify-end space-x-2">
                        <x-atom.link-table-only-faicon icon="fas fa-edit" 
                            warna="yellow" class="px-2 py-1"
                            href="{{ route('matakuliah.edit', ['id'=>$item->id]) }}"/>
                        <x-atom.button-table-only-faicon icon="fas fa-trash" 
                            warna="red" class="px-2 py-1 float-right" 
                            wire:click="$emit('swalToDeleted','FixHapusMatakuliah',{{$item->id}})"/>
                    </td>
                </tr>
                @endforeach


            </tbody>
        </table>

        <div class="px-3 py-2">
            {{ $isiTabel->links() }}
        </div>

    </div>

</div>
<br>