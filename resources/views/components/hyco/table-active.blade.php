@props(['status' => ''])

<div>
    @if($status=='active')
    <span class="bg-green-100 text-green-700 px-2 rounded">{{ $status }}</span>
    @else
    <span class="bg-red-100 text-red-700 px-2 rounded">{{ $status }}</span>
    @endif
</div>
