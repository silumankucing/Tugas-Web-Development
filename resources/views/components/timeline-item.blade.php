@props(['item'])

<li class="relative pl-10 sm:pl-12">
    <span
        class="absolute left-[0.6875rem] top-8 h-[calc(100%-1.5rem)] w-px bg-white/10 sm:left-[0.8125rem]"
        aria-hidden="true"
    ></span>

    <span
        class="absolute left-0 top-1.5 grid size-6 place-items-center rounded-full border border-white/20 bg-night-900 sm:size-7"
        aria-hidden="true"
    >
        <span class="size-2 rounded-full bg-neon-400"></span>
    </span>

    <div class="rounded-xl border border-white/10 bg-white/[0.03] p-5 transition hover:border-white/20 sm:p-6">
        <div class="flex flex-wrap items-center gap-3">
            <span
                class="rounded-full border border-white/10 bg-white/5 px-2.5 py-1 text-[10px] font-semibold uppercase tracking-[0.16em] text-mist-400"
            >
                {{ $item['period'] }}
            </span>

            @if (! empty($item['current']))
                <span class="inline-flex items-center gap-1.5 text-[10px] font-semibold uppercase tracking-[0.16em] text-mist-500">
                    <span class="size-1.5 rounded-full bg-mist-500"></span>
                    Saat ini
                </span>
            @endif
        </div>

        <h3 class="mt-3 font-display text-lg font-medium text-mist-100">{{ $item['title'] }}</h3>
        <p class="text-sm text-mist-400">{{ $item['organization'] }}</p>
        <p class="mt-3 text-sm leading-relaxed text-mist-400">{{ $item['description'] }}</p>

        @if (! empty($item['highlights']))
            <ul class="mt-4 space-y-2.5">
                @foreach ($item['highlights'] as $highlight)
                    <li class="flex gap-2.5 text-sm leading-relaxed text-mist-400">
                        <x-icon name="check" class="mt-0.5 size-4 text-mist-500" />
                        <span>{{ $highlight }}</span>
                    </li>
                @endforeach
            </ul>
        @endif
    </div>
</li>
