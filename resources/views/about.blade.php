@extends('layouts.app')

@section('title', 'About')
@section('meta_description', 'Profil Angga Saputra — Mechanical Design Engineer dan mahasiswa Informatika.')

@section('content')
    <h1 class="sr-only">About</h1>

    {{-- ============================ PROFIL ============================= --}}
    <section class="container-x pt-12 pb-16 lg:pt-16 lg:pb-20">
        <div class="max-w-3xl">
            {{-- Narasi profil --}}
            <div data-reveal>
                <p class="text-[10px] font-semibold uppercase tracking-[0.24em] text-mist-500">
                    Profil Singkat
                </p>

                <div class="mt-5 space-y-4 text-base leading-relaxed text-mist-300">
                    @foreach ($owner['bio'] as $paragraph)
                        <p>{{ $paragraph }}</p>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    {{-- =========================== BIDANG FOKUS ======================== --}}
    <section class="section border-y border-white/10 bg-night-900/40">
        <div class="container-x">
            <x-section-heading
                eyebrow="Fokus"
                title="Tiga area yang saling melengkapi."
                description="Software, desain mekanikal, dan spatial computing."
            />

            <div class="mt-12 grid gap-5 md:grid-cols-3">
                @foreach ($expertise as $item)
                    <article
                        data-reveal
                        class="surface group rounded-2xl p-7 transition duration-200 hover:border-neon-400/30"
                    >
                        <span
                            class="grid size-12 place-items-center rounded-xl border border-white/10 bg-night-800 text-mist-500"
                        >
                            <x-icon :name="$item['icon']" class="size-5" />
                        </span>

                        <h3 class="mt-6 font-display text-lg font-medium text-mist-100">{{ $item['title'] }}</h3>
                        <p class="mt-3 text-sm leading-relaxed text-mist-400">{{ $item['description'] }}</p>

                        <ul class="mt-5 space-y-2">
                            @foreach (array_slice($item['skills'], 0, 4) as $skill)
                                <li class="flex items-center gap-2 text-sm text-mist-300">
                                    <span class="size-1.5 rounded-full bg-mist-500"></span>
                                    {{ $skill }}
                                </li>
                            @endforeach
                        </ul>
                    </article>
                @endforeach
            </div>
        </div>
    </section>

    {{-- =========================== PENGALAMAN ========================= --}}
    <section class="section">
        <div class="container-x grid gap-10 lg:grid-cols-[0.8fr_1.2fr] lg:gap-14">
            <div class="lg:sticky lg:top-28 lg:self-start">
                <x-section-heading
                    eyebrow="Perjalanan"
                    title="Pengalaman & pendidikan."
                    description="Dari lantai produksi manufaktur medis sampai baris kode aplikasi web dan prototipe VR."
                />

                <div class="mt-8 space-y-4">
                    <div class="surface rounded-2xl p-5">
                        <p class="text-[10px] font-semibold uppercase tracking-[0.18em] text-mist-500">Pendidikan</p>
                        <p class="mt-2 font-display text-base font-medium text-mist-100">Universitas Ciputra</p>
                        <p class="text-sm text-mist-400">S1 Informatika · 2024 — sekarang</p>
                        <p class="mt-2 text-sm leading-relaxed text-mist-400">
                            Fokus pada software engineering, basis data, dan pengembangan aplikasi web modern.
                        </p>
                    </div>

                    <div class="surface rounded-2xl p-5">
                        <p class="text-[10px] font-semibold uppercase tracking-[0.18em] text-mist-500">Latar belakang</p>
                        <p class="mt-2 font-display text-base font-medium text-mist-100">Mechanical Design</p>
                        <p class="text-sm text-mist-400">Medical manufacturing · 7+ tahun</p>
                        <p class="mt-2 text-sm leading-relaxed text-mist-400">
                            Perancangan part, jig, dan fixture produksi dengan standar presisi tinggi.
                        </p>
                    </div>
                </div>
            </div>

            <ol class="space-y-6">
                @foreach ($experience as $item)
                    <x-timeline-item :item="$item" />
                @endforeach
            </ol>
        </div>
    </section>
    {{-- ============================= KEAHLIAN ========================== --}}
    <section class="section border-t border-white/10 bg-night-900/40">
        <div class="container-x">
            <x-section-heading
                eyebrow="Keahlian"
                title="Toolbox yang saya pakai sehari-hari."
                description="Dari CAD dan drawing teknis sampai Laravel, Unity, dan pipeline rendering."
            />

            <div class="mt-12 grid gap-5 md:grid-cols-3">
                @foreach ($skillGroups as $group)
                    <div data-reveal class="surface rounded-2xl p-7">
                        <div class="flex items-center gap-3">
                            <span class="grid size-10 place-items-center rounded-xl border border-white/10 bg-night-800 text-mist-500">
                                <x-icon :name="$group['icon']" class="size-4" />
                            </span>
                            <h3 class="font-display text-base font-medium text-mist-100">{{ $group['title'] }}</h3>
                        </div>

                        <ul class="mt-5 flex flex-wrap gap-2">
                            @foreach ($group['skills'] as $skill)
                                <li class="rounded-full border border-white/10 px-3 py-1 text-xs font-medium text-mist-300">
                                    {{ $skill }}
                                </li>
                            @endforeach
                        </ul>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
