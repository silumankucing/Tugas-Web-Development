@props(['name' => 'sparkles', 'class' => 'size-5'])

<svg
    xmlns="http://www.w3.org/2000/svg"
    viewBox="0 0 24 24"
    fill="none"
    stroke="currentColor"
    stroke-width="1.6"
    stroke-linecap="round"
    stroke-linejoin="round"
    {{ $attributes->class('inline-block shrink-0 ' . $class) }}
    aria-hidden="true"
    focusable="false"
>
    @switch($name)
        @case('arrow-right')
            <path d="M4 12h15" />
            <path d="m13 6 6 6-6 6" />
            @break

        @case('arrow-left')
            <path d="M20 12H5" />
            <path d="m11 6-6 6 6 6" />
            @break

        @case('arrow-up-right')
            <path d="M7 17 17 7" />
            <path d="M8 7h9v9" />
            @break

        @case('menu')
            <path d="M4 7h16" />
            <path d="M4 12h16" />
            <path d="M4 17h10" />
            @break

        @case('close')
            <path d="m6 6 12 12" />
            <path d="M18 6 6 18" />
            @break

        @case('mail')
            <rect x="3" y="5" width="18" height="14" rx="2" />
            <path d="m3.5 6.5 8.5 6 8.5-6" />
            @break

        @case('github')
            <path
                fill="currentColor"
                stroke="none"
                d="M12 .5C5.73.5.9 5.33.9 11.6c0 4.9 3.17 9.05 7.57 10.52.55.1.75-.24.75-.53 0-.26-.01-1.13-.01-2.05-3.08.57-3.87-.75-4.11-1.44-.14-.35-.74-1.44-1.26-1.73-.43-.23-1.05-.8-.01-.81.97-.01 2.44 1.14 2.44 1.14.72 1.23 1.87 1.77 2.87 1.77.75 0 1.35-.24 1.73-.53.55-1.58 1.52-1.96 2.77-2.35-2.35-.27-4.82-1.18-4.82-6.07 0-1.34.48-2.44 1.27-3.3-.13-.31-.55-1.56.12-3.25 0 0 .88-.28 2.89 1.09a9.9 9.9 0 0 1 2.63-.35c.89 0 1.79.12 2.63.35 2.01-1.37 2.89-1.09 2.89-1.09.67 1.69.25 2.94.12 3.25.79.86 1.27 1.96 1.27 3.3 0 4.9-2.48 5.79-4.84 6.06.38.33.72.97.72 1.96 0 1.42-.01 2.56-.01 2.91 0 .29.2.64.76.53 4.39-1.47 7.56-5.62 7.56-10.52C23.1 5.33 18.27.5 12 .5Z"
            />
            @break

        @case('map-pin')
            <path d="M12 21s7-5.5 7-11a7 7 0 1 0-14 0c0 5.5 7 11 7 11Z" />
            <circle cx="12" cy="10" r="2.6" />
            @break

        @case('code')
            <path d="m8 6-6 6 6 6" />
            <path d="m16 6 6 6-6 6" />
            @break

        @case('cube')
            <path d="m12 3 8 4.5v9L12 21l-8-4.5v-9L12 3Z" />
            <path d="m4 7.5 8 4.5 8-4.5" />
            <path d="M12 12v9" />
            @break

        @case('rocket')
            <path d="M12 3c3.5 1.5 5.5 5 5.5 9l-3 3h-5l-3-3C6.5 8 8.5 4.5 12 3Z" />
            <circle cx="12" cy="9" r="1.8" />
            <path d="M9.5 15 8 21l4-2 4 2-1.5-6" />
            @break

        @case('vr')
            <path d="M4 8h16a2 2 0 0 1 2 2v4a2 2 0 0 1-2 2h-4l-4-2-4 2H4a2 2 0 0 1-2-2v-4a2 2 0 0 1 2-2Z" />
            <circle cx="8" cy="12" r="1.5" />
            <circle cx="16" cy="12" r="1.5" />
            @break

        @case('check')
            <path d="m4.5 12.5 5 5 10-11" />
            @break

        @case('check-circle')
            <circle cx="12" cy="12" r="9" />
            <path d="m8 12 3 3 5-6" />
            @break

        @case('x-circle')
            <circle cx="12" cy="12" r="9" />
            <path d="m9 9 6 6" />
            <path d="m15 9-6 6" />
            @break

        @case('copy')
            <rect x="9" y="9" width="12" height="12" rx="2" />
            <path d="M15 5H6a1 1 0 0 0-1 1v9" />
            @break

        @case('clock')
            <circle cx="12" cy="12" r="9" />
            <path d="M12 7v5l3.5 2" />
            @break

        @case('calendar')
            <rect x="3" y="5" width="18" height="16" rx="2" />
            <path d="M8 3v4" />
            <path d="M16 3v4" />
            <path d="M3 10h18" />
            @break

        @case('wrench')
            <path
                d="M14.7 6.3a1 1 0 0 0 0 1.4l1.6 1.6a1 1 0 0 0 1.4 0l3.77-3.77a6 6 0 0 1-7.94 7.94l-6.91 6.91a2.12 2.12 0 0 1-3-3l6.91-6.91a6 6 0 0 1 7.94-7.94l-3.76 3.76Z"
            />
            @break

        @case('layers')
            <path d="m12 3 9 5-9 5-9-5 9-5Z" />
            <path d="m3 13 9 5 9-5" />
            @break

        @case('external-link')
            <path d="M14 4h6v6" />
            <path d="M20 4 10 14" />
            <path d="M19 14v5a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1V6a1 1 0 0 1 1-1h5" />
            @break

        @case('send')
            <path d="m4 12 16-8-6 16-3-6-7-2Z" />
            <path d="m11 14 3-3" />
            @break

        @case('user')
            <circle cx="12" cy="8" r="4" />
            <path d="M4 21a8 8 0 0 1 16 0" />
            @break

        @case('sparkles')
            <path d="M12 3v4" />
            <path d="M12 17v4" />
            <path d="M3 12h4" />
            <path d="M17 12h4" />
            <path d="m5.6 5.6 2.8 2.8" />
            <path d="m15.6 15.6 2.8 2.8" />
            <path d="m18.4 5.6-2.8 2.8" />
            <path d="m8.4 15.6-2.8 2.8" />
            @break

        @default
            <circle cx="12" cy="12" r="8" />
            <path d="M12 8v4l2.5 2.5" />
    @endswitch
</svg>
