@extends('layouts.app')

@section('title', 'Contact')
@section('meta_description', 'Email dan GitHub Angga Saputra.')

@section('content')
    <h1 class="sr-only">Contact</h1>

    <section class="container-x pb-20 pt-16 lg:pb-28 lg:pt-20">
        <ul class="divide-y divide-white/10 border-y border-white/10">
            @foreach (config('site.contact_channels') as $channel)
                <li>
                    <a
                        href="{{ $channel['href'] }}"
                        @if (str_starts_with($channel['href'], 'http'))
                            target="_blank"
                            rel="noopener noreferrer"
                        @endif
                        class="group flex items-center justify-between gap-6 py-6"
                    >
                        <span class="flex min-w-0 items-center gap-4">
                            <span class="grid size-10 shrink-0 place-items-center rounded-xl border border-white/15 text-mist-400 transition group-hover:border-neon-400/40 group-hover:text-neon-300">
                                <x-icon :name="$channel['icon']" class="size-4" />
                            </span>

                            <span class="min-w-0">
                                <span class="block text-[10px] font-semibold uppercase tracking-[0.2em] text-mist-500">
                                    {{ $channel['label'] }}
                                </span>
                                <span class="mt-1 block truncate text-base font-medium text-mist-100 transition group-hover:text-neon-200 sm:text-lg">
                                    {{ $channel['value'] }}
                                </span>
                            </span>
                        </span>

                        <x-icon
                            name="arrow-up-right"
                            class="size-4 shrink-0 text-mist-500 transition group-hover:text-neon-300"
                        />
                    </a>
                </li>
            @endforeach
        </ul>
    </section>
@endsection
