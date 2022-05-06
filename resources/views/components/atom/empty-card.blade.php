<div class="overflow-auto rounded text-center text-sm py-2">
    {{-- <-kosong-> --}}
    {{-- @php
        $a=[
            'kosong_spotlight.svg',
            'kosong_inbox.svg',
            'kosong.svg',
        ];
        $random_keys=array_rand($a,1);
        .$a[$random_keys]
    @endphp --}}
    <img class="w-14 saturate-50 opacity-60 d-block mx-auto" src="{{asset('gambar/kosong_inbox.svg')}}">
    <span class="text-xs">kosong</span>
    <div class="pt-2">
        {{$slot}}
    </div>
</div>