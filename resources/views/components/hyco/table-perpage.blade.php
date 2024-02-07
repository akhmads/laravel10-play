@props([ 'data' => [], 'value' => '', 'span' => '1' ])

@php
if($span=='1') $span = 'lg:col-span-1';
if($span=='2') $span = 'lg:col-span-2';
@endphp

<select {!! $attributes->merge(['class' => 'col-span-12 '.$span.' w-full border border-slate-300 focus:border-blue-400 py-2 px-3 rounded-md shadow-sm text-sm']) !!}>
    @foreach($data as $val)
    <option value="{{ $val }}" @if($val==$value) selected @endif>{{ $val }}</option>
    @endforeach
</select>
