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

        <h1 class="text-3xl text-black pb-4">Edit Slot Jam</h1>
        <section class="w-full">
            
            <div class="bg-white overflow-auto mb-6 py-3 px-6 rounded">

                <div class="flex border-b border-40">
                    <div class="w-1/4 py-4">
                        <h4 class="font-normal text-80">hari</h4>
                    </div> 
                    <div class="w-3/4 py-4 break-words">
                        <x-atom.form-select-standar wire:model="jam.id_hari">
                            <option value="" hidden selected>...</option>
                            @foreach ($hari as $item)
                                <option class="w-full capitalize" value='{{$item->id}}'>
                                    {{$item->nama}}
                                </option>
                            @endforeach
                        </x-atom.form-select-standar>
                        <x-atom.form-error-input :kolom="'jam.id_hari'" />
                    </div>
                </div>

                <div class="flex border-b border-40">
                    <div class="w-1/4 py-4">
                        <h4 class="font-normal text-80">awal</h4>
                    </div> 
                    <div class="w-3/4 py-4 break-words">
                        <x-atom.form-input-standar wire:model="jam.awal" placeholder="awal" type="time" />
                        <x-atom.form-error-input :kolom="'jam.awal'" />
                    </div>
                </div>

                <div class="flex border-b border-40">
                    <div class="w-1/4 py-4">
                        <h4 class="font-normal text-80">akhir</h4>
                    </div> 
                    <div class="w-3/4 py-4 break-words">
                        <x-atom.form-input-standar wire:model="jam.akhir" placeholder="akhir" type="time" />
                        <x-atom.form-error-input :kolom="'jam.akhir'" />
                    </div>
                </div>

                <div class="flex border-b border-40">
                    <div class="w-1/4 py-4">
                        <h4 class="font-normal text-80">SKS</h4>
                    </div> 
                    <div class="w-3/4 py-4 break-words">
                        <x-atom.form-input-standar wire:model="jam.sks" placeholder="sks" type="number" />
                        <x-atom.form-error-input :kolom="'jam.sks'" />
                    </div>
                </div>

                <div wire:loading.delay.long wire:target='save'>
                    <x-atom.loading_fullpage-image  />
                </div>

            </div>

            <div class="flex justify-end space-x-2">
                <x-atom.button-link class="p-2" :color="'zinc'"
                href="{{ route('slotjam') }}">
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
