@extends('layouts.app')

@section('title', $post->title)
@section('meta_description', $post->excerpt)
@section('og_type', 'article')

@section('content')
    <article>
        {{-- ============================ HEADER ============================ --}}
        <header class="container-x pb-10 pt-12 sm:pt-16">
            <a
                href="{{ route('blog.index') }}"
                class="inline-flex items-center gap-2 text-[11px] font-semibold uppercase tracking-[0.18em] text-mist-500 transition hover:text-neon-300"
            >
                <x-icon name="arrow-left" class="size-4" />
                Semua Artikel
            </a>

            <div class="mt-7 flex flex-wrap items-center gap-3 text-[11px] uppercase tracking-[0.16em] text-mist-500">
                <span
                    class="rounded-full border border-neon-400/25 bg-neon-400/5 px-3 py-1 font-semibold text-neon-300"
                >
                    {{ $post->category }}
                </span>
                <span class="inline-flex items-center gap-1.5">
                    <x-icon name="calendar" class="size-3.5" />
                    <time datetime="{{ $post->published_at->toDateString() }}">
                        {{ $post->published_at->format('d M Y') }}
                    </time>
                </span>
                <span class="inline-flex items-center gap-1.5">
                    <x-icon name="clock" class="size-3.5" />
                    {{ $post->read_time }} menit baca
                </span>
            </div>

            <h1
                class="mt-5 max-w-4xl font-display text-3xl font-semibold leading-[1.12] tracking-tight text-mist-100 sm:text-4xl lg:text-5xl"
            >
                {{ $post->title }}
            </h1>

            <p class="mt-5 max-w-3xl text-base leading-relaxed text-mist-400 sm:text-lg">
                {{ $post->excerpt }}
            </p>

            <div class="mt-8 flex flex-wrap items-center justify-between gap-4 border-t border-white/5 pt-6">
                <div class="flex items-center gap-3">
                    <span
                        class="grid size-10 place-items-center rounded-full border border-neon-400/30 bg-neon-400/10 font-display text-xs font-medium text-neon-200"
                    >
                        {{ config('site.owner.initials') }}
                    </span>
                    <div>
                        <p class="text-sm font-semibold text-mist-100">{{ $post->author }}</p>
                        <p class="text-xs text-mist-500">{{ config('site.owner.role') }}</p>
                    </div>
                </div>

                <button
                    type="button"
                    data-copy="{{ url()->current() }}"
                    class="inline-flex items-center gap-2 rounded-full border border-white/10 bg-white/[0.03] px-4 py-2 text-xs font-medium text-mist-300 transition hover:border-neon-400/40 hover:text-neon-200"
                >
                    <x-icon name="copy" class="size-4" />
                    <span data-copy-label>Salin tautan</span>
                </button>
            </div>
        </header>

        {{-- ============================= COVER ============================ --}}
        <figure class="container-x">
            <div class="overflow-hidden rounded-2xl border border-white/10 bg-night-900">
                <img
                    src="{{ asset($post->cover_image) }}"
                    alt="Sampul artikel {{ $post->title }}"
                    class="aspect-[16/9] w-full object-cover"
                >
            </div>
        </figure>

        {{-- ============================== BODY ============================ --}}
        <div class="container-x mt-12 grid gap-10 pb-16 lg:grid-cols-[minmax(0,1fr)_17rem] lg:gap-14 lg:pb-24">
            <div class="min-w-0 max-w-3xl">
                <x-article-content :blocks="$post->content" />

                {{-- Kartu penulis --}}
                <div class="mt-14 rounded-2xl border border-white/10 bg-white/[0.03] p-6 sm:p-8">
                    <div class="flex flex-col gap-5 sm:flex-row sm:items-center">
                        <span
                            class="grid size-14 shrink-0 place-items-center rounded-2xl border border-neon-400/30 bg-neon-400/10 font-display text-base font-medium text-neon-200"
                        >
                            {{ config('site.owner.initials') }}
                        </span>
                        <div>
                            <p class="text-[10px] font-semibold uppercase tracking-[0.2em] text-mist-500">Ditulis oleh</p>
                            <p class="mt-1 font-display text-lg font-medium text-mist-100">{{ $post->author }}</p>
                            <p class="mt-1 text-sm leading-relaxed text-mist-400">
                                {{ config('site.owner.role') }}. {{ config('site.owner.headline') }}
                            </p>
                        </div>
                    </div>

                    <div class="mt-6 flex flex-wrap gap-3">
                        <x-button :href="route('about')" variant="secondary" icon="arrow-right">Profil Lengkap</x-button>
                        <x-button :href="route('contact.index')" variant="ghost" icon="mail">Hubungi Saya</x-button>
                    </div>
                </div>
            </div>

            {{-- Sidebar --}}
            <aside class="space-y-4 lg:sticky lg:top-28 lg:self-start">
                <div class="surface rounded-3xl p-6">
                    <p class="text-[10px] font-semibold uppercase tracking-[0.2em] text-mist-500">Ringkasan</p>

                    <dl class="mt-4 space-y-3 text-sm">
                        <div class="flex items-center justify-between gap-3">
                            <dt class="text-mist-500">Kategori</dt>
                            <dd class="font-medium text-neon-300">{{ $post->category }}</dd>
                        </div>
                        <div class="flex items-center justify-between gap-3">
                            <dt class="text-mist-500">Tanggal</dt>
                            <dd class="text-mist-200">{{ $post->published_at->format('d M Y') }}</dd>
                        </div>
                        <div class="flex items-center justify-between gap-3">
                            <dt class="text-mist-500">Durasi</dt>
                            <dd class="text-mist-200">{{ $post->read_time }} menit</dd>
                        </div>
                        <div class="flex items-center justify-between gap-3">
                            <dt class="text-mist-500">Penulis</dt>
                            <dd class="text-mist-200">{{ $post->author }}</dd>
                        </div>
                    </dl>
                </div>

                <div class="surface rounded-3xl p-6">
                    <p class="text-[10px] font-semibold uppercase tracking-[0.2em] text-mist-500">Bagikan artikel</p>
                    <button
                        type="button"
                        data-copy="{{ url()->current() }}"
                        class="mt-4 flex w-full items-center justify-center gap-2 rounded-xl border border-white/10 bg-white/[0.04] px-4 py-2.5 text-xs font-medium text-mist-200 transition hover:border-neon-400/40 hover:text-neon-200"
                    >
                        <x-icon name="copy" class="size-4" />
                        <span data-copy-label>Salin tautan artikel</span>
                    </button>
                    <p class="mt-3 text-center text-[11px] leading-relaxed text-mist-500">
                        Tempel tautan ini ke percakapan tim atau media sosial Anda.
                    </p>
                </div>
            </aside>
        {{-- ============================ TERKAIT =========================== --}}
        @if ($relatedPosts->isNotEmpty())
            <section class="border-t border-white/5 bg-night-900/40 py-16 lg:py-20">
                <div class="container-x">
                    <x-section-heading
                        eyebrow="Baca Juga"
                        title="Artikel terkait"
                        description="Tulisan lain dengan kategori atau tema yang berdekatan."
                    />

                    <div class="mt-10 grid gap-6 md:grid-cols-2">
                        @foreach ($relatedPosts as $relatedPost)
                            <div data-reveal class="h-full">
                                <x-post-card :post="$relatedPost" />
                            </div>
                        @endforeach
                    </div>
                </div>
            </section>
        @endif
    </article>
@endsection
