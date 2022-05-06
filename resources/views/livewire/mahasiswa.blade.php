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

    <script>
        window.livewire.on('swalEditMahasiswa', (judul,isi,idMahasiswa) => {
            
            const { value: formValues } = Swal.fire({
                title: judul,
                html: '<div class="px-1 pb-2">'+isi+'</div>',
                focusConfirm: false,
                showCancelButton: true,
                preConfirm: () => {
                    const nama = Swal.getPopup().querySelector('#nama').value
                    const nim = Swal.getPopup().querySelector('#nim').value
                    const jurusan = Swal.getPopup().querySelector('#jurusan').value
                    return { nama: nama, nim: nim, jurusan: jurusan  }
                }
            }).then((result)=>{
                if(result.isConfirmed)
                    window.livewire.emit('terkonfirmasiEditMahasiswa',result.value, idMahasiswa);
                    resolve()
            })
            
        })
    </script>
</x-slot>




<div id="atas" class="container mx-auto bg-gray-100 mb-28">

    <div class="flex justify-between items-center mt-6">
        <div>
            <div class="f-playfair font-bold text-2xl capitalize">
                Mahasiswa
            </div>
            <span class="text-sm">Data mahasiswa</span>
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
                <a class="space-x-2 item-center f-roboto bg-green-500 shadow-sm text-white  inline-flex p-2 rounded cursor-pointer   hover:shadow-md  hover:bg-green-600" href="{{route('import.mahasiswa')}}">
                    <span class="material-icons">
                        group_add
                    </span>
                    <span>Import Data Baru</span>
                </a>
            </div>
        </div>
        

        <table class="min-w-max w-full table-auto">
            
            @if ($isiTabel->isNotEmpty())
                <thead>
                    <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                        <th class="py-3 px-6 text-left">No</th>
                        <th class="py-3 px-6 text-left">Nama</th>
                        <th class="py-3 px-6 text-right">Jurusan</th>
                        <th class="py-3 px-6 text-center">Actions</th>
                    </tr>
                </thead>
            @else
                <x-atom.empty-table/>
            @endif

            <tbody class="text-gray-600 text-sm font-light">

                @foreach ($isiTabel as $item)
                    <tr class="border-b border-gray-200 hover:bg-gray-100">
                        <td class="py-3 px-6 text-left whitespace-nowrap">
                            <span class="font-medium">
                                {{ $loop->iteration + $isiTabel->firstItem() - 1 }}
                            </span>
                        </td>
                        <td class="py-3 px-6 text-left whitespace-nowrap">
                            <div class="font-medium w-96 truncate">
                                {{$item->nama}}
                                {{-- <sup>id : {{$item->id}}</sup> --}}
                            </div>
                        </td>
                        <td class="py-3 px-6 text-right space-y-1 capitalize">
                            {{$item->jurusan->nama}}
                        </td>
    
                        
                        <td class="py-3 px-6 text-center">
                            <div class="flex item-center justify-center space-x-7">
                                <x-molecul.dropdown-tabel :title="'Opsi'">

                                    <x-molecul.dropdown-tabel-item class="cursor-pointer" wire:click="editMahasiswa({{$item->id}})">
                                        <div class="flex items-center space-x-2 text-yellow-500">
                                            <span class="material-icons">
                                                edit
                                            </span>
                                            <span>Edit</span>
                                        </div>
                                    </x-molecul.dropdown-tabel-item>

                                    <x-molecul.dropdown-tabel-item class="cursor-pointer" wire:click="$emit('swalToDeletedWithMessage','terkonfirmasiHapusMahasiswa',{{$item->id}},'anda akan menghapus Mahasiswa ini')">
                                        <div class="flex items-center space-x-2 text-red-500">
                                            <span class="material-icons">
                                                delete
                                            </span>
                                            <span>Hapus</span>
                                        </div>
                                    </x-molecul.dropdown-tabel-item>
                                </x-molecul.dropdown-tabel>

                            </div>
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


