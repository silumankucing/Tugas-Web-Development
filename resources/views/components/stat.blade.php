@props(['value', 'label'])

<div class="flex flex-col gap-1">
    <dt class="font-display text-2xl font-semibold tracking-tight text-mist-100 sm:text-3xl">
        {{ $value }}
    </dt>
    <dd class="max-w-[11rem] text-xs leading-relaxed text-mist-500">{{ $label }}</dd>
</div>
