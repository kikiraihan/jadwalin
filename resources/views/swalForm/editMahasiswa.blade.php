<div class="text-left">
    <div>
        <label class="f-roboto ml-1 text-gray-500 text-sm">Nama</label>
        <input class="shadow text-sm border-none p-2 w-full rounded focus:outline-none focus:ring-2 focus:ring-blue-300 placeholder-gray-300" type="text" wire:model="nama" id="nama" placeholder="..." value="{{$m->nama}}">
    </div>
    
    <div>
        <label class="f-roboto ml-1 text-gray-500 text-sm">NIM</label>
        <input class="shadow text-sm border-none p-2 w-full rounded focus:outline-none focus:ring-2 focus:ring-blue-300 placeholder-gray-300" type="text" wire:model="nim" id="nim" placeholder="..." value="{{$m->nim}}">
    </div>
    
    <div>
        <label class="f-roboto ml-1 text-gray-500 text-sm">Jurusan</label>
        <x-atom.form-select-standar wire:model="jurusan" id="jurusan">
            <option value="" hidden selected>...</option>
            @foreach ($j as $key=>$item)
                <option class="w-full" @if($item->id == $m->jurusan->id) selected @endif value='{{$item->id}}'>{{$item->nama}}</option>
            @endforeach
        </x-atom.form-select-standar>
        {{-- <input class="shadow text-sm border-none p-2 w-full rounded focus:outline-none focus:ring-2 focus:ring-blue-300 placeholder-gray-300" type="text" wire:model="jurusan" id="jurusan" placeholder="..." value="{{$m->jurusan}}"> --}}
    </div>
</div>