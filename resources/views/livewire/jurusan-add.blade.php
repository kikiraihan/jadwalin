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

        <h1 class="text-3xl text-black pb-4">Tambah Jurusan</h1>
        <section class="w-full">
            
            <div class="bg-white overflow-auto mb-6 py-3 px-6 rounded">

                <div class="flex border-b border-40">
                    <div class="w-1/4 py-4">
                        <h4 class="font-normal text-80">Nama</h4>
                    </div> 
                    <div class="w-3/4 py-4 break-words">
                        <x-atom.form-input-standar wire:model="jur.nama" placeholder="judul"/>
                        <x-atom.form-error-input :kolom="'jur.nama'" />
                    </div>
                </div>

                <div wire:loading.delay.long wire:target='save'>
                    <x-atom.loading_fullpage-image  />
                </div>

            </div>

            <div class="flex justify-end space-x-2">
                <x-atom.button-link class="p-2" :color="'zinc'"
                href="{{ route('jurusan') }}">
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
