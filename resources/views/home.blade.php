@extends('layouts.app')

@section('title', 'Home')
@section('meta_description', config('site.owner.tagline'))

@section('content')
    {{-- ============================== HERO ============================== --}}
    <section class="relative flex min-h-[calc(100svh-4.5rem)] items-center overflow-hidden">
        <div class="container-x py-16">
            <div data-reveal class="mx-auto max-w-3xl text-center">
                <h1 class="font-display text-4xl font-medium leading-[1.05] tracking-tight text-mist-100 sm:text-5xl lg:text-6xl">
                    <span class="block">{{ $owner['name'] }}</span>
                    <span class="mt-5 block text-2xl font-normal leading-snug text-mist-300 sm:text-3xl">
                        {{ $owner['headline'] }}
                    </span>
                </h1>

                <p class="mx-auto mt-6 max-w-xl text-base leading-relaxed text-mist-400">
                    {{ $owner['role'] }}. {{ $owner['tagline'] }}
                </p>
            </div>
        </div>
    </section>
@endsection
