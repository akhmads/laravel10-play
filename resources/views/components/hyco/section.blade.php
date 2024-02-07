@props(['submit', 'cols' => '6', 'gap' => 'gap-6'])

@php
switch ($cols) {
    case '1' : $Cols = 'grid-cols-1'; break;
    case '2' : $Cols = 'grid-cols-2'; break;
    case '3' : $Cols = 'grid-cols-3'; break;
    case '4' : $Cols = 'grid-cols-4'; break;
    case '5' : $Cols = 'grid-cols-5'; break;
    case '6' : $Cols = 'grid-cols-6'; break;
    case '12' : $Cols = 'grid-cols-12'; break;
    default : $Cols = 'grid-cols-12'; break;
}
@endphp

<div {{ $attributes->merge(['class' => '']) }}>

    @isset($submit)
    <form wire:submit="{{ $submit }}">
    @endisset

    <div class="px-4 py-5 bg-white sm:p-6 shadow {{ isset($footer) ? 'sm:rounded-tl-md sm:rounded-tr-md' : 'sm:rounded-md' }}">
        <div class="grid {{ $Cols }} {{ $gap }}">
            {{ $body }}
        </div>
    </div>

    @isset($footer)
        <div {{ $footer->attributes->merge(['class' => 'flex items-center gap-4 px-4 py-3 bg-gray-50 text-right sm:px-6 shadow sm:rounded-bl-md sm:rounded-br-md']) }}>
            {{ $footer }}
        </div>
    @endisset

    @isset($submit)
    </form>
    @endisset
</div>
