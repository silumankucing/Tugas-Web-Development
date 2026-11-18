<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="theme-color" content="#060a12">

        <title>@yield('title', 'Home') — {{ config('site.owner.name') }}</title>
        <meta name="description" content="@yield('meta_description', config('site.owner.tagline'))">
        <meta name="author" content="{{ config('site.owner.name') }}">

        <meta property="og:site_name" content="{{ config('site.owner.name') }}">
        <meta property="og:type" content="@yield('og_type', 'website')">
        <meta property="og:title" content="@yield('title', 'Home') — {{ config('site.owner.name') }}">
        <meta property="og:description" content="@yield('meta_description', config('site.owner.tagline'))">
        <meta property="og:image" content="{{ asset('images/portfolio/porto_model3d_1.jpg') }}">

        <link rel="icon" href="{{ asset('favicon.svg') }}" type="image/svg+xml">

        @fonts
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <script>
            // Menandai bahwa JS aktif agar animasi reveal aman untuk konten.
            document.documentElement.classList.add('js');
        </script>
    </head>
    <body class="min-h-screen bg-night-950 font-sans text-mist-300 antialiased">
        <a
            href="#main-content"
            class="sr-only rounded-full bg-neon-400 px-5 py-2 text-sm font-semibold text-night-950 focus:not-sr-only focus:absolute focus:left-4 focus:top-4 focus:z-60"
        >
            Lewati ke konten
        </a>

        {{-- Latar minimalis: tanpa grid atau orb dekoratif --}}
        <x-navbar />

        <main id="main-content" class="relative z-10">
            @yield('content')
        </main>
    </body>
</html>
