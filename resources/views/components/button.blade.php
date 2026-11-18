@props(['href' => null, 'variant' => 'primary', 'icon' => null, 'type' => 'button'])

@php
    $variants = [
        'primary' => 'bg-neon-400 text-night-950 hover:bg-neon-300',
        'secondary' => 'border border-white/20 bg-transparent text-mist-100 hover:border-white/50 hover:bg-white/5',
        'ghost' => 'text-mist-400 hover:bg-white/5 hover:text-mist-100',
    ];

    $classes =
        'group inline-flex items-center justify-center gap-2 rounded-full px-5 py-2.5 text-sm font-medium tracking-tight transition duration-200 '
        . ($variants[$variant] ?? $variants['primary']);
@endphp

@if ($href)
    <a href="{{ $href }}" {{ $attributes->class($classes) }}>
        {{ $slot }}

        @if ($icon)
            <x-icon :name="$icon" class="size-4 transition-transform duration-300 group-hover:translate-x-0.5" />
        @endif
    </a>
@else
    <button type="{{ $type }}" {{ $attributes->class($classes) }}>
        {{ $slot }}

        @if ($icon)
            <x-icon :name="$icon" class="size-4 transition-transform duration-300 group-hover:translate-x-0.5" />
        @endif
    </button>
@endif
