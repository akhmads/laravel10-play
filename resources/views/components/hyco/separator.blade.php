@props(['cols' => '6'])

@php
switch ($cols) {
    case '1' : $Cols = 'col-span-1'; break;
    case '2' : $Cols = 'col-span-2'; break;
    case '3' : $Cols = 'col-span-3'; break;
    case '4' : $Cols = 'col-span-4'; break;
    case '5' : $Cols = 'col-span-5'; break;
    case '6' : $Cols = 'col-span-6'; break;
    case '12' : $Cols = 'col-span-12'; break;
    default : $Cols = 'col-span-6'; break;
}
@endphp

<div class="relative {{ $Cols }} font-semibold text-orange-400" {{ $attributes }}>&nbsp;
    <div class="absolute top-0 left-0 bg-white text-lg px-2 py-1 z-10">{{ $slot }}</div>
    <div class="w-full absolute top-[-5px] left-0 border-b border-b-orange-200">&nbsp;</div>
</div>
