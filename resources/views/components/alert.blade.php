@props(['type' => 'info', 'title' => null])

@php
    $styles = [
        'success' => ['border-emerald-400/30 bg-emerald-400/10', 'text-emerald-300', 'check-circle'],
        'error' => ['border-rose-400/30 bg-rose-400/10', 'text-rose-300', 'x-circle'],
        'info' => ['border-neon-400/30 bg-neon-400/10', 'text-neon-300', 'sparkles'],
    ];

    [$boxClasses, $iconColor, $iconName] = $styles[$type] ?? $styles['info'];
@endphp

<div
    role="{{ $type === 'error' ? 'alert' : 'status' }}"
    {{ $attributes->class(['flex items-start gap-3 rounded-2xl border p-4 text-sm text-mist-200 sm:p-5', $boxClasses]) }}
>
    <x-icon :name="$iconName" class="mt-0.5 size-5 {{ $iconColor }}" />

    <div class="flex-1">
        @if ($title)
            <p class="font-display text-sm font-semibold text-mist-100">{{ $title }}</p>
        @endif

        <div class="{{ $title ? 'mt-1' : '' }} leading-relaxed">{{ $slot }}</div>
    </div>
</div>
