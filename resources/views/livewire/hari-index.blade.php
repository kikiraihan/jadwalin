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


<div id="atas" class="container mx-auto bg-gray-100 mb-28 px-3 md:px-0">

    <div class="flex justify-between items-center mt-6">
        <div>
            <div class="f-playfair font-bold text-2xl capitalize">
                Hari
            </div>
            <span class="text-sm">Data hari perkuliahan yang akan tersedia dalam penjadwalan.</span>
        </div>
        <div wire:loading.delay.long>
            <x-atom.loading_fullpage-spin  />
        </div>
    </div>
    
    <div class="bg-white shadow-md rounded my-6 overflow-x-auto">

        <div class="grid grid-cols-4 items-center">
            <div class="flex p-2 space-x-1 col-span-2">
            </div>

            <div class="text-right col-span-2 pr-2 py-2">
                <x-atom.link-table-only-faicon icon="fas fa-plus" 
                    warna="emerald" class="px-2 py-1" 
                    href="{{ route('hari.add') }}"/>
            </div>
        </div>
        

        <table class="min-w-max w-full table-auto">
            
            @if ($isiTabel->isNotEmpty())
            <thead>
                <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                    <th class="py-3 px-4 text-left">ID</th>
                    <th class="py-3 px-4 text-left">Nama</th>
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
                        {{$item->id}}
                    </td>
                    <td class="py-3 px-4 text-left whitespace-nowrap">
                        <div class="font-medium w-96 truncate">
                            {{$item->nama}}
                            {{-- <sup>id : {{$item->id}}</sup> --}}
                        </div>
                    </td>
                    
                    <td class="text-left py-3 px-4 flex justify-end space-x-2">
                        @if (!in_array($item->nama,['senin', 'selasa', 'rabu', 'kamis', 'jumat']))
                            <x-atom.button-table-only-faicon icon="fas fa-trash" warna="red" class="px-2 py-1 float-right" wire:click="$emit('swalToDeleted','FixHapusHari',{{$item->id}})"/>
                        @endif
                    </td>
                </tr>
                @endforeach


            </tbody>
        </table>

        {{-- <div class="px-3 py-2">
            {{ $isiTabel->links() }}
        </div> --}}

    </div>

</div>
<br>