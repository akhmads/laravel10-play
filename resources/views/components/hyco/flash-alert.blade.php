<div>
    @if(session('success'))
    <div class="fixed top-[82px] z-50 left-1/2 -translate-x-1/2 inline-flex item-center bg-green-200 text-green-800 border border-green-300 px-6 py-4 rounded-lg">
        {{ session('success') }}
        <button type="button" class="" onclick="this.parentNode.remove()">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="3" stroke="currentColor" class="w-4 h-4 ml-4">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>
    </div>
    @endif

    {{-- @if ($errors->any())
    <div onclick="this.remove()" x-init="setTimeout(() => $el.remove(), 5000)" class="cursor-pointer fixed top-[20px] right-[20px] z-[9999] inline-flex item-center text-base bg-rose-700 text-rose-50 border border-rose-800 px-5 py-2 rounded shadow-lg">
        <div>
            <div class="font-semibold ">{{ __('Error found') }}</div>
            <div>{{ __('Please check your input again') }}</div>
        </div>
        <button type="button" class="" onclick="this.parentNode.remove()">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="3" stroke="currentColor" class="w-4 h-4 ml-4">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>
    </div>
    @endif --}}

    @if(session()->has('error'))
    <div class="fixed top-[82px] z-50 left-1/2 -translate-x-1/2 inline-flex item-center bg-red-50 text-red-700 border border-red-200 px-6 py-4 rounded-lg">
        {{ session('error') }}
        <button type="button" class="" onclick="this.parentNode.remove()">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="3" stroke="currentColor" class="w-4 h-4 ml-4">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>
    </div>
    @endif
</div>
