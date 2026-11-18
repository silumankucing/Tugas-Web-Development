@props(['eyebrow' => null, 'title' => null, 'description' => null, 'align' => 'left'])

<div
    class="{{ $align === 'center' ? 'flex flex-col items-center text-center' : 'flex flex-col gap-6 sm:flex-row sm:items-end sm:justify-between' }}"
>
    <div class="max-w-2xl">
        @if ($eyebrow)
            <p
                class="{{ $align === 'center' ? 'justify-center' : '' }} text-[10px] font-semibold uppercase tracking-[0.24em] text-mist-500"
            >
                {{ $eyebrow }}
            </p>
        @endif

        <h2 class="mt-3 font-display text-2xl font-medium leading-tight tracking-tight text-mist-100 sm:text-3xl">
            {{ $title ?? $slot }}
        </h2>

        @if ($description)
            <p class="mt-3 text-base leading-relaxed text-mist-400">
                {{ $description }}
            </p>
        @endif
    </div>

    @isset($action)
        <div class="shrink-0">{{ $action }}</div>
    @endisset
</div>
