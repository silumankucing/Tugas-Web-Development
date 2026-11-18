@props(['eyebrow' => null, 'title' => null, 'description' => null])

<section class="relative pb-12 pt-14 sm:pt-16 lg:pb-14 lg:pt-20">
    <div class="container-x">
        @if ($eyebrow)
            <p class="text-[10px] font-semibold uppercase tracking-[0.24em] text-mist-500">
                {{ $eyebrow }}
            </p>
        @endif

        <h1
            class="mt-4 max-w-3xl font-display text-3xl font-medium leading-[1.12] tracking-tight text-mist-100 sm:text-4xl lg:text-5xl"
        >
            {{ $title ?? $slot }}
        </h1>

        @if ($description)
            <p class="mt-5 max-w-2xl text-base leading-relaxed text-mist-400">
                {{ $description }}
            </p>
        @endif

        @isset($actions)
            <div class="mt-8 flex flex-wrap items-center gap-3">{{ $actions }}</div>
        @endisset

        @isset($aside)
            <div class="mt-7">{{ $aside }}</div>
        @endisset
    </div>
</section>
