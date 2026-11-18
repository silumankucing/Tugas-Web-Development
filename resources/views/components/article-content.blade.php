@props(['blocks' => []])

<div class="article-body text-base leading-relaxed text-mist-300">
    @foreach ($blocks as $block)
        @php($type = $block['type'] ?? 'paragraph')

        @switch($type)
            @case('heading')
                <h2 class="font-display text-2xl font-medium tracking-tight text-mist-100 sm:text-3xl">
                    {{ $block['text'] ?? '' }}
                </h2>
                @break

            @case('list')
                <ul class="space-y-3">
                    @foreach ($block['items'] ?? [] as $item)
                        <li class="flex gap-3">
                            <span class="mt-2 size-1.5 shrink-0 rounded-full bg-neon-400"></span>
                            <span>{{ $item }}</span>
                        </li>
                    @endforeach
                </ul>
                @break

            @case('quote')
                <blockquote
                    class="rounded-xl border border-white/10 bg-white/[0.03] px-6 py-5 text-lg italic text-mist-200 sm:px-8"
                >
                    <p>{{ $block['text'] ?? '' }}</p>

                    @if (! empty($block['cite']))
                        <footer class="mt-4 text-xs not-italic uppercase tracking-[0.18em] text-mist-500">
                            &mdash; {{ $block['cite'] }}
                        </footer>
                    @endif
                </blockquote>
                @break

            @case('code')
                <figure class="overflow-hidden rounded-2xl border border-white/10 bg-night-900">
                    <figcaption
                        class="flex items-center justify-between border-b border-white/5 px-4 py-2.5 text-[10px] font-semibold uppercase tracking-[0.18em] text-mist-500"
                    >
                        <span>{{ $block['language'] ?? 'code' }}</span>
                        <span class="flex items-center gap-1.5" aria-hidden="true">
                            <span class="size-2 rounded-full bg-mist-500/40"></span>
                            <span class="size-2 rounded-full bg-mist-500/40"></span>
                            <span class="size-2 rounded-full bg-mist-500/40"></span>
                        </span>
                    </figcaption>
                    <pre class="overflow-x-auto p-4 text-sm leading-relaxed text-neon-200"><code>{{ $block['text'] ?? '' }}</code></pre>
                </figure>
                @break

            @default
                <p>{{ $block['text'] ?? '' }}</p>
        @endswitch
    @endforeach
</div>
