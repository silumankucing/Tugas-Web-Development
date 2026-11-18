@props(['href', 'active' => false])

<a
    href="{{ $href }}"
    @if ($active) aria-current="page" @endif
    {{ $attributes->class([
        'relative inline-flex items-center rounded-full px-4 py-2 text-sm font-medium transition-colors duration-200',
        'bg-neon-400/10 text-neon-100 ring-1 ring-inset ring-neon-400/30' => $active,
        'text-mist-400 hover:bg-neon-400/[0.06] hover:text-mist-100' => ! $active,
    ]) }}
>
    {{ $slot }}
</a>
