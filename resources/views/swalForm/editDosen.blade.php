<div class="text-left">
    <div>
        <label class="f-roboto ml-1 text-gray-500 text-sm">Nama</label>
        <input class="shadow text-sm border-none p-2 w-full rounded focus:outline-none focus:ring-2 focus:ring-blue-300 placeholder-gray-300" type="text" wire:model="nama" id="nama" placeholder="..." value="{{$dosen->nama}}">
    </div>
    
    <div>
        <label class="f-roboto ml-1 text-gray-500 text-sm">NIP</label>
        <input class="shadow text-sm border-none p-2 w-full rounded focus:outline-none focus:ring-2 focus:ring-blue-300 placeholder-gray-300" type="text" wire:model="nip" id="nip" placeholder="..." value="{{$dosen->nip}}">
    </div>
    
    <div>
        <label class="f-roboto ml-1 text-gray-500 text-sm">Jurusan</label>
        <input class="shadow text-sm border-none p-2 w-full rounded focus:outline-none focus:ring-2 focus:ring-blue-300 placeholder-gray-300" type="text" wire:model="jurusan" id="jurusan" placeholder="..." value="{{$dosen->jurusan}}">
    </div>
</div>