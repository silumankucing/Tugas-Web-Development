@php
    $owner = config('site.owner');
    $navLinks = config('site.nav');
@endphp

<header
    data-site-header
    class="site-header sticky top-0 z-50 border-b border-white/10 bg-night-950/85 backdrop-blur-md"
>
    <div class="container-x flex h-18 items-center justify-center gap-6 py-4">
        {{-- Navigasi desktop --}}
        <nav class="hidden items-center gap-1 lg:flex" aria-label="Navigasi utama">
            @foreach ($navLinks as $link)
                <x-nav-link :href="route($link['route'])" :active="request()->routeIs($link['pattern'])">
                    {{ $link['label'] }}
                </x-nav-link>
            @endforeach
        </nav>

        {{-- Tombol menu mobile --}}
        <button
            type="button"
            data-nav-toggle
            aria-expanded="false"
            aria-controls="mobile-nav"
            class="ml-auto grid size-11 place-items-center rounded-xl border border-white/10 bg-white/5 text-mist-200 transition hover:border-neon-400/40 hover:text-mist-100 lg:hidden"
        >
            <span class="sr-only">Buka menu navigasi</span>
            <x-icon name="menu" class="size-5" />
        </button>
    </div>

    {{-- Navigasi mobile --}}
    <div id="mobile-nav" data-mobile-nav class="mobile-nav border-t border-white/5 bg-night-900/95 backdrop-blur-xl">
        <nav class="container-x space-y-1 py-4" aria-label="Navigasi mobile">
            @foreach ($navLinks as $link)
                @php($active = request()->routeIs($link['pattern']))
                <a
                    href="{{ route($link['route']) }}"
                    @if ($active) aria-current="page" @endif
                    class="{{ $active ? 'bg-neon-400/10 text-neon-100' : 'text-mist-400 hover:bg-neon-400/[0.06] hover:text-mist-100' }} flex items-center justify-between rounded-xl px-4 py-3 text-sm font-medium transition"
                >
                    {{ $link['label'] }}
                    <x-icon name="arrow-up-right" class="size-4 opacity-60" />
                </a>
            @endforeach

            <div class="mt-4 flex flex-col gap-3 border-t border-white/5 pt-4">
                <x-button :href="route('contact.index')" class="w-full" icon="send">Kirim Pesan</x-button>
                <p class="text-center text-xs text-mist-500">{{ $owner['location'] }}</p>
            </div>
        </nav>
    </div>
</header>
