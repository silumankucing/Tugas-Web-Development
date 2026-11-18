@extends('layouts.app')

@section('title', 'Portfolio')
@section('meta_description', 'Kumpulan proyek AR, VR, 3D modeling, dan rendering karya Angga Saputra beserta teknologi yang digunakan.')

@section('content')
    <h1 class="sr-only">Portfolio</h1>

    <section class="container-x pb-20 pt-16 lg:pb-28 lg:pt-20">
        {{-- Filter kategori --}}
        <div class="border-y border-white/5 py-5">
            <div class="flex flex-wrap gap-2" role="group" aria-label="Filter portofolio">
                <a
                    href="{{ route('portfolio.index') }}"
                    @class([
                        'inline-flex items-center gap-2 rounded-full border px-4 py-2 text-xs font-medium transition',
                        'border-neon-400/50 bg-neon-400/10 text-neon-200' => ! $activeCategory,
                        'border-white/10 bg-white/[0.03] text-mist-400 hover:border-white/25 hover:text-mist-100' => $activeCategory,
                    ])
                >
                    Semua
                    <span class="rounded-full bg-night-950/60 px-2 py-0.5 text-[10px] text-mist-400">
                        {{ $totalItems }}
                    </span>
                </a>

                @foreach ($categories as $category)
                    <a
                        href="{{ route('portfolio.index', ['category' => $category]) }}"
                        @class([
                            'inline-flex items-center gap-2 rounded-full border px-4 py-2 text-xs font-medium transition',
                            'border-neon-400/50 bg-neon-400/10 text-neon-200' => $activeCategory === $category,
                            'border-white/10 bg-white/[0.03] text-mist-400 hover:border-white/25 hover:text-mist-100' => $activeCategory !== $category,
                        ])
                    >
                        {{ $category }}
                        <span class="rounded-full bg-night-950/60 px-2 py-0.5 text-[10px] text-mist-400">
                            {{ $categoryCounts[$category] ?? 0 }}
                        </span>
                    </a>
                @endforeach
            </div>
        </div>

        <p class="mt-6 text-sm text-mist-500">
            Menampilkan
            <span class="font-semibold text-mist-200">{{ $items->count() }}</span>
            proyek
            @if ($activeCategory)
                pada kategori <span class="font-medium text-neon-300">{{ $activeCategory }}</span>
            @else
                dari seluruh kategori
            @endif
            .
        </p>

        @if ($items->isEmpty())
            <div class="surface mt-8 flex flex-col items-center justify-center rounded-3xl px-6 py-20 text-center">
                <span class="grid size-14 place-items-center rounded-2xl border border-white/10 bg-night-800 text-neon-300">
                    <x-icon name="cube" class="size-6" />
                </span>
                <h2 class="mt-5 font-display text-xl font-semibold text-mist-100">Belum ada proyek di kategori ini</h2>
                <p class="mt-2 max-w-md text-sm text-mist-400">
                    Silakan pilih kategori lain, atau lihat seluruh karya yang tersedia.
                </p>
                <x-button :href="route('portfolio.index')" variant="secondary" icon="arrow-left" class="mt-6">
                    Lihat Semua Proyek
                </x-button>
            </div>
        @else
            <div class="mt-8 grid gap-6 md:grid-cols-2 xl:grid-cols-3">
                @foreach ($items as $item)
                    <div data-reveal class="h-full">
                        <x-portfolio-card :item="$item" />
                    </div>
                @endforeach
            </div>
        @endif
    </section>
@endsection
