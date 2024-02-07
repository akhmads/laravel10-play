@props([ 'span' => '3', 'placeholder' => 'Search...' ])

@php
switch ($span) {
    case '1' : $Span = 'lg:col-span-1'; break;
    case '2' : $Span = 'lg:col-span-2'; break;
    case '3' : $Span = 'lg:col-span-3'; break;
    case '4' : $Span = 'lg:col-span-4'; break;
    case '5' : $Span = 'lg:col-span-5'; break;
    case '6' : $Span = 'lg:col-span-6'; break;
    case '7' : $Span = 'lg:col-span-7'; break;
    case '8' : $Span = 'lg:col-span-8'; break;
    case '9' : $Span = 'lg:col-span-9'; break;
    case '10' : $Span = 'lg:col-span-10'; break;
    case '11' : $Span = 'lg:col-span-11'; break;
    case '12' : $Span = 'lg:col-span-12'; break;
    default : $Span = 'lg:col-span-12'; break;
}
@endphp

<input type="text" {!! $attributes->merge(['placeholder' => $placeholder, 'class' => 'col-span-12 '.$Span.' w-full border border-slate-300 focus:border-blue-400 focus:outline-none py-2 px-3 text-sm rounded-md shadow-sm']) !!}>
