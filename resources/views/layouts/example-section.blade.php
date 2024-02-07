@props(['width' => '7xl'])

@php
$Width = 'max-w-7xl';
if ( $width == '7xl' ) $Width = 'max-w-7xl';
if ( $width == 'full' ) $Width = 'w-full';
@endphp

<div>
    <div {{ $attributes->merge(['class' => 'py-12']) }}>
        <div class="{{ $Width }} mx-auto sm:px-6 lg:px-8 lg:flex items-start justify-between gap-6">
            <div wire:ignore class="shrink lg:w-[240px] space-y-4 lg:sticky lg:top-8">
                <div class="bg-white border border-gray-200 rounded-xl shadow-sm">
                    <div class="flex flex-col gap-1 px-3 py-4">
                        <a href="{{ route('example.example') }}" wire:navigate class="px-3 py-1 hover:bg-sky-50 rounded-lg @if(request()->routeIs('example.example*')) bg-sky-100 @endif">Example</a>

                        {{-- <a href="{{ route('master.country') }}" wire:navigate class="px-3 py-1 hover:bg-sky-50 rounded-lg @if(request()->routeIs('master.country*')) bg-sky-100 @endif">Country</a>
                        <a href="{{ route('master.province') }}" wire:navigate class="px-3 py-1 hover:bg-sky-50 rounded-lg @if(request()->routeIs('master.province*')) bg-sky-100 @endif">Province</a>
                        <a href="{{ route('master.city') }}" wire:navigate class="px-3 py-1 hover:bg-sky-50 rounded-lg @if(request()->routeIs('master.city*')) bg-sky-100 @endif">City</a>
                        <a href="{{ route('master.district') }}" wire:navigate class="px-3 py-1 hover:bg-sky-50 rounded-lg @if(request()->routeIs('master.district*')) bg-sky-100 @endif">District</a>
                        <a href="{{ route('master.subdistrict') }}" wire:navigate class="px-3 py-1 hover:bg-sky-50 rounded-lg @if(request()->routeIs('master.subdistrict*')) bg-sky-100 @endif">Subdistrict</a> --}}
                    </div>
                </div>
            </div>
            <div {{ $slot->attributes->merge(['class' => 'grow mt-6 lg:mt-0']) }}>
                {{ $slot }}
            </div>
        </div>
    </div>
</div>
