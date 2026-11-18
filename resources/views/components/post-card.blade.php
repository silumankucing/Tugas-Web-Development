@props(['post', 'featured' => false])

@if ($featured)
    <article class="h-full">
        <a
            href="{{ route('blog.show', $post) }}"
            class="group grid h-full overflow-hidden rounded-2xl border border-white/10 bg-night-900 transition duration-200 hover:border-neon-400/30 lg:grid-cols-2"
        >
            <div class="relative aspect-[16/10] overflow-hidden lg:aspect-auto lg:h-full">
                <img
                    src="{{ asset($post->cover_image) }}"
                    alt="Sampul artikel {{ $post->title }}"
                    class="absolute inset-0 h-full w-full object-cover"
                >
                <span
                    class="absolute left-5 top-5 inline-flex items-center gap-2 rounded-full border border-white/15 bg-night-950/80 px-3 py-1.5 text-[10px] font-semibold uppercase tracking-[0.16em] text-mist-300 backdrop-blur"
                >
                    <x-icon name="sparkles" class="size-3" />
                    Artikel Unggulan
                </span>
            </div>

            <div class="flex flex-col p-6 sm:p-8 lg:p-10">
                <div class="flex flex-wrap items-center gap-2 text-[11px] uppercase tracking-[0.14em] text-mist-500">
                    <span class="text-mist-300">{{ $post->category }}</span>
                    <span aria-hidden="true">&middot;</span>
                    <time datetime="{{ $post->published_at->toDateString() }}">
                        {{ $post->published_at->format('d M Y') }}
                    </time>
                    <span aria-hidden="true">&middot;</span>
                    <span>{{ $post->read_time }} menit baca</span>
                </div>

                <h3
                    class="mt-4 font-display text-2xl font-medium leading-snug text-mist-100 sm:text-3xl"
                >
                    {{ $post->title }}
                </h3>

                <p class="mt-4 text-sm leading-relaxed text-mist-400 sm:text-base">
                    {{ $post->excerpt }}
                </p>

                <span
                    class="mt-auto inline-flex items-center gap-2 pt-8 text-sm font-medium text-mist-500 transition group-hover:text-mist-100"
                >
                    Baca artikel
                    <x-icon
                        name="arrow-right"
                        class="size-4 transition-transform duration-300 group-hover:translate-x-1"
                    />
                </span>
            </div>
        </a>
    </article>
@else
    <article class="h-full">
        <a
            href="{{ route('blog.show', $post) }}"
            class="group flex h-full flex-col overflow-hidden rounded-2xl border border-white/10 bg-night-900 transition duration-200 hover:border-neon-400/30"
        >
            <div class="relative aspect-[16/10] overflow-hidden">
                <img
                    src="{{ asset($post->cover_image) }}"
                    alt="Sampul artikel {{ $post->title }}"
                    loading="lazy"
                    class="h-full w-full object-cover"
                >
                <span
                    class="absolute left-4 top-4 rounded-full border border-white/15 bg-night-950/80 px-3 py-1 text-[10px] font-semibold uppercase tracking-[0.16em] text-mist-300 backdrop-blur"
                >
                    {{ $post->category }}
                </span>
            </div>

            <div class="flex flex-1 flex-col p-6">
                <div class="flex flex-wrap items-center gap-2 text-[11px] uppercase tracking-[0.14em] text-mist-500">
                    <time datetime="{{ $post->published_at->toDateString() }}">
                        {{ $post->published_at->format('d M Y') }}
                    </time>
                    <span aria-hidden="true">&middot;</span>
                    <span>{{ $post->read_time }} menit baca</span>
                </div>

                <h3
                    class="mt-3 font-display text-lg font-medium leading-snug text-mist-100"
                >
                    {{ $post->title }}
                </h3>

                <p class="mt-3 line-clamp-3 text-sm leading-relaxed text-mist-400">
                    {{ $post->excerpt }}
                </p>

                <span
                    class="mt-auto inline-flex items-center gap-2 pt-5 text-xs font-medium uppercase tracking-[0.14em] text-mist-500 transition group-hover:text-mist-100"
                >
                    Selengkapnya
                    <x-icon
                        name="arrow-right"
                        class="size-4 transition-transform duration-300 group-hover:translate-x-1"
                    />
                </span>
            </div>
        </a>
    </article>
@endif
