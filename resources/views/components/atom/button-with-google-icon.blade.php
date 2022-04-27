@props([
    'icon'=>'clear'
    ])

<a 
    {!! $attributes->merge([
        'class'=>"flex space-x-2 item-center f-roboto"
    ]) !!} >
    <span class="material-icons text-base font-bold">
        {{$icon}}
    </span>
    <span>{{$slot}}</span>
</a>