@props([
    'warna'=>'gray',
    'rounded'=>'',
    'icon'=>'fas fa-check',
    'spin'=>false,
    ])

<button
{!! $attributes->merge([
    'class'=>"shadow rounded".$rounded." focus:outline-none focus:ring-2 truncate items-center flex justify-center gap-2 hover:bg-".$warna."-200 focus:ring-blue-300 text-".$warna."-600 bg-".$warna."-100",
    'type'=>"button",
]) !!} >
    <i class="{{$icon}} {{$spin?'animate-spin':''}}"></i>
    <span class="text-xs font-semibold">
        {{$slot}}
    </span>
</button>