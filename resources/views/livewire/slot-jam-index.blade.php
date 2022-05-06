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
                Slot Jam
            </div>
            <span class="text-sm">
                Slot jam yang tersedia pada tiap <b>Hari</b>. Satu slot jam berisi 1 sks (50 menit). <br>
                Direkomendasikan dalam sehari, slot jam paling pertama diawali pukul 08:00, dan paling akhir pada pukul 17:10.
            </span>
        </div>
        <div wire:loading.delay.long>
            <x-atom.loading_fullpage-spin  />
        </div>
    </div>
    
    <div class="bg-white shadow-md rounded my-6 overflow-x-auto">

        <div class="grid grid-cols-4 items-center">
            <div class="flex p-2 space-x-1 col-span-1 items-center">
                <x-atom.form-select-standar wire:model="filterIdHari">
                    <option value="" hidden selected>Filter Hari</option>
                    @foreach ($hari as $item)
                        <option class="w-full capitalize" value='{{$item->id}}'>
                            {{$item->nama}}
                        </option>
                    @endforeach
                </x-atom.form-select-standar>
            </div>

            <div class="col-span-3 pr-2 py-2 flex justify-end space-x-2">
                <x-atom.link-table-only-faicon icon="fas fa-plus" 
                    warna="emerald" class="px-2 py-1" 
                    href="{{ route('slotjam.add') }}"/>
                <x-atom.button-table-only-faicon icon="fas fa-recycle" 
                    warna="blue" class="px-2 py-1 float-right" 
                    wire:click="$emit('swalAndaYakinCeklis','FixResetDefaultConfig','Anda akan me reset slot jam ke pengaturan default (rekomendasi), anda yakin?')"/>
            </div>
        </div>
        

        <table class="min-w-max w-full table-auto">
            
            @if ($isiTabel->isNotEmpty())
            <thead>
                <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                    <th class="py-3 px-4 text-left">No</th>
                    <th class="py-3 px-4 text-left">#Hari</th>
                    <th class="py-3 px-4 text-left">Awal</th>
                    <th class="py-3 px-4 text-left">Akhir</th>
                    <th class="py-3 px-4 text-center">SKS</th>
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
                            {{$item->hari->nama}}
                        </div>
                    </td>

                    <td class="py-3 px-4 text-left whitespace-nowrap">
                        {{$item->awal}}
                    </td>

                    <td class="py-3 px-4 text-left whitespace-nowrap">
                        {{$item->akhir}}
                    </td>

                    <td class="py-3 px-4 text-center whitespace-nowrap">
                        {{$item->sks}}
                    </td>
                    
                    <td class="text-left py-3 px-4 flex justify-end space-x-2">
                        <x-atom.link-table-only-faicon icon="fas fa-edit" 
                            warna="yellow" class="px-2 py-1"
                            href="{{ route('slotjam.edit', ['id'=>$item->id]) }}"/>
                        <x-atom.button-table-only-faicon icon="fas fa-trash" 
                            warna="red" class="px-2 py-1 float-right" 
                            wire:click="$emit('swalToDeleted','FixHapusSlotJam',{{$item->id}})"/>
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