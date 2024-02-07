@props(['data'])

<div {{ $attributes->merge(['class' => 'space-y-6 text-sm']) }}>
    <div class="flex flex-row items-start justify-between gap-5">
        @isset($headingLeft)
        <div {{ $headingLeft->attributes->merge(['class' => 'grid grid-cols-12 gap-2 grow' ]) }}>
            {{ $headingLeft }}
        </div>
        @endisset

        @isset($headingRight)
        <div {{ $headingRight->attributes->merge(['class' => 'flex flex-row justify-end shrink-0' ]) }}>
            {{ $headingRight }}
        </div>
        @endisset
    </div>

    <div class="max-w-full bg-white border border-gray-200 rounded-xl shadow-sm dark:bg-slate-900 dark:border-gray-700 overflow-x-auto overflow-hidden">
        <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
            <thead class="bg-gray-50 dark:bg-slate-800">

            {{ $header ?? '' }}

            </thead>
            <tbody class="divide-y divide-gray-200 dark:divide-gray-700">

            {{ $slot }}

            </tbody>
        </table>
    </div>

    {{ $footer ?? '' }}
</div>
