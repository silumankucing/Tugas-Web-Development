@props(['item'])

<article
    class="group relative flex h-full flex-col overflow-hidden rounded-2xl border border-white/10 bg-night-900 transition duration-200 hover:border-neon-400/30"
>
    <div class="relative aspect-[4/3] overflow-hidden">
        <img
            src="{{ asset($item->image) }}"
            alt="Pratinjau proyek {{ $item->title }}"
            loading="lazy"
            class="h-full w-full object-cover"
        >

        <span
            class="absolute left-4 top-4 rounded-full border border-white/15 bg-night-950/80 px-3 py-1 text-[10px] font-semibold uppercase tracking-[0.16em] text-mist-300 backdrop-blur"
        >
            {{ $item->category }}
        </span>
        <span
            class="absolute right-4 top-4 rounded-full bg-night-950/80 px-3 py-1 text-[11px] font-medium text-mist-500 backdrop-blur"
        >
            {{ $item->year }}
        </span>
    </div>

    <div class="flex flex-1 flex-col p-6">
        <h3 class="font-display text-lg font-medium leading-snug text-mist-100 sm:text-xl">
            {{ $item->title }}
        </h3>

        <p class="mt-3 text-sm leading-relaxed text-mist-400">
            {{ $item->description }}
        </p>

        @if (! empty($item->tech_stack))
            <ul class="mt-5 flex flex-wrap gap-2" aria-label="Teknologi yang digunakan">
                @foreach ($item->tech_stack as $tech)
                    <li
                        class="rounded-full border border-white/10 px-2.5 py-1 text-[11px] font-medium text-mist-300"
                    >
                        {{ $tech }}
                    </li>
                @endforeach
            </ul>
        @endif
    </div>
</article>
