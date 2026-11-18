@extends('layouts.app')

@section('title', 'Blog')
@section('meta_description', 'Catatan pendek Angga Saputra tentang hal-hal di luar pekerjaan.')

@section('content')
    <h1 class="sr-only">Blog</h1>

    <section class="container-x pb-20 pt-16 lg:pb-28 lg:pt-20">
        {{-- Filter kategori --}}
        <div
            class="flex flex-wrap gap-2 border-b border-white/10 pb-6"
            role="group"
            aria-label="Filter kategori artikel"
        >
            <a
                href="{{ route('blog.index') }}"
                @class([
                    'rounded-full border px-4 py-2 text-xs font-medium transition',
                    'border-neon-400/50 bg-neon-400/10 text-neon-200' => ! $activeCategory,
                    'border-white/10 bg-white/[0.03] text-mist-400 hover:border-white/25 hover:text-mist-100' => $activeCategory,
                ])
            >
                Semua ({{ $totalPosts }})
            </a>

            @foreach ($categories as $category)
                <a
                    href="{{ route('blog.index', ['category' => $category]) }}"
                    @class([
                        'rounded-full border px-4 py-2 text-xs font-medium transition',
                        'border-neon-400/50 bg-neon-400/10 text-neon-200' => $activeCategory === $category,
                        'border-white/10 bg-white/[0.03] text-mist-400 hover:border-white/25 hover:text-mist-100' => $activeCategory !== $category,
                    ])
                >
                    {{ $category }}
                </a>
            @endforeach
        </div>

        @if ($featuredPost)
            <div data-reveal class="mb-14 mt-10">
                <x-post-card :post="$featuredPost" featured />
            </div>
        @endif

        <div class="flex flex-wrap items-center justify-between gap-3 border-t border-white/5 pt-8">
            <h2 class="font-display text-lg font-semibold text-mist-100">
                @if ($activeCategory)
                    Kategori <span class="text-neon-300">{{ $activeCategory }}</span>
                @else
                    Artikel terbaru
                @endif
            </h2>
            <p class="text-xs uppercase tracking-[0.18em] text-mist-500">{{ $posts->count() }} artikel</p>
        </div>

        @if ($posts->isEmpty())
            <div class="surface mt-8 flex flex-col items-center justify-center rounded-3xl px-6 py-20 text-center">
                <span class="grid size-14 place-items-center rounded-2xl border border-white/10 bg-night-800 text-neon-300">
                    <x-icon name="sparkles" class="size-6" />
                </span>
                <h2 class="mt-5 font-display text-xl font-semibold text-mist-100">
                    Belum ada artikel lain di kategori ini
                </h2>
                <p class="mt-2 max-w-md text-sm text-mist-400">
                    Artikel unggulan di atas mungkin sudah mewakili kategori ini. Silakan jelajahi kategori lain atau kembali ke semua artikel.
                </p>
                <x-button :href="route('blog.index')" variant="secondary" icon="arrow-left" class="mt-6">
                    Semua Artikel
                </x-button>
            </div>
        @else
            <div class="mt-8 grid gap-6 md:grid-cols-2 lg:grid-cols-3">
                @foreach ($posts as $post)
                    <div data-reveal class="h-full">
                        <x-post-card :post="$post" />
                    </div>
                @endforeach
            </div>
        @endif
    </section>
@endsection
