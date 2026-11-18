<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Profil Pemilik Website
    |--------------------------------------------------------------------------
    |
    | Seluruh konten statis profil dikumpulkan di sini agar halaman Home,
    | About, Contact, dan Footer memakai satu sumber data yang konsisten.
    |
    */

    'owner' => [
        'name' => 'Angga Saputra',
        'initials' => 'AS',
        'role' => 'Jr. Software Engineer & Experienced Mechanical Engineer',
        'headline' => 'Mechanical engineer yang juga membangun aplikasi web.',
        'tagline' => 'Mechanical Design Engineer yang memperdalam Computer Science untuk membangun solusi 3D, AR, VR dan Render untuk solusi Manufacturing dan Engineering Management',
        'email' => 'anggasaputra@deepspacespatial.com',
        'github' => 'silumankucing',
        'github_url' => 'https://github.com/silumankucing',
        'location' => 'Surabaya, Indonesia',
        'availability' => 'Terbuka untuk proyek baru.',
        'student_profile' => 'Mechanical Design Engineer yang memperdalam ilmu Informatika dan mengembangkan solusi 3D, AR, VR, serta web. Saat ini merintis DEEPSPACE, sebuah bisnis digital di bidang spatial computing yang berfokus pada pengembangan solusi 3D Modeling, VR, AR, dan mobile rendering.',
        'bio' => [
            'Saya bekerja sebagai Mechanical Design Engineer di industri medical manufacturing, merancang part, fixture, dan housing perangkat yang harus memenuhi standar presisi tinggi. Dari proses itu saya belajar bahwa dokumentasi, komunikasi teknis, dan pengalaman pengguna bukan hal sekunder.',
            'Ketertarikan pada software membuat saya melanjutkan studi Informatika di Universitas Ciputra. Fokus saya sekarang adalah membawa data dan proses engineering ke dalam aplikasi web, AR, dan VR yang mudah digunakan.',
            'Melalui DEEPSPACE, saya mengembangkan solusi spatial computing untuk visualisasi produk, pelatihan operator, dan review desain. Saat ini DEEPSPACE berada pada tahap closed beta testing bersama pengguna awal.',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Navigasi Utama
    |--------------------------------------------------------------------------
    */

    'nav' => [
        ['label' => 'Home', 'route' => 'home', 'pattern' => 'home'],
        ['label' => 'About', 'route' => 'about', 'pattern' => 'about'],
        ['label' => 'Portfolio', 'route' => 'portfolio.index', 'pattern' => 'portfolio.*'],
        ['label' => 'Blog', 'route' => 'blog.index', 'pattern' => 'blog.*'],
        ['label' => 'Contact', 'route' => 'contact.index', 'pattern' => 'contact.*'],
    ],

    /*
    |--------------------------------------------------------------------------
    | Ringkasan Angka (Home)
    |--------------------------------------------------------------------------
    */

    'stats' => [
        ['value' => '7+', 'label' => 'Tahun sebagai Mechanical Design Engineer'],
        ['value' => '8', 'label' => 'Proyek portofolio AR, VR, 3D & rendering'],
        ['value' => '3', 'label' => 'Bidang keahlian utama'],
        ['value' => '1', 'label' => 'Venture: DEEPSPACE (closed beta)'],
    ],

    /*
    |--------------------------------------------------------------------------
    | Bidang Keahlian
    |--------------------------------------------------------------------------
    */

    'expertise' => [
        [
            'title' => 'Software Engineering',
            'icon' => 'code',
            'description' => 'Membangun aplikasi web dan prototipe interaktif dengan pendekatan yang rapi, teruji, dan mudah dirawat.',
            'skills' => ['Laravel', 'PHP', 'JavaScript', 'MySQL', 'REST API', 'Git'],
        ],
        [
            'title' => 'Mechanical Design Engineering',
            'icon' => 'cube',
            'description' => 'Merancang komponen dan fixture manufaktur medis dengan perhatian pada toleransi, DFM, dan keandalan.',
            'skills' => ['SolidWorks', 'CAD Modeling', 'GD&T', 'DFM/DFA', 'Technical Drawing', 'Prototyping'],
        ],
        [
            'title' => 'Venture Development',
            'icon' => 'rocket',
            'description' => 'Mengembangkan DEEPSPACE dari validasi masalah, prototipe, hingga uji coba bersama pengguna awal.',
            'skills' => ['Spatial Computing', 'Product Discovery', 'Business Model', 'Go-to-Market', 'Lean Startup'],
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Pengalaman
    |--------------------------------------------------------------------------
    */

    'experience' => [
        [
            'period' => '2025 — Sekarang',
            'title' => 'Founder & Product Lead',
            'organization' => 'DEEPSPACE · Spatial Computing Studio',
            'description' => 'Merintis bisnis digital di bidang spatial computing yang berfokus pada 3D Modeling, VR, AR, dan mobile rendering.',
            'highlights' => [
                'Menyusun arah produk dan roadmap modul training VR serta AR maintenance.',
                'Memimpin closed beta testing bersama operator dan tim engineering.',
                'Membangun pipeline 3D dari CAD hingga build Unity yang siap dipakai di perangkat mobile dan headset.',
            ],
            'current' => true,
        ],
        [
            'period' => '2019 — Sekarang',
            'title' => 'Mechanical Design Engineer',
            'organization' => 'Medical Manufacturing Industry',
            'description' => 'Merancang part, jig, dan fixture produksi untuk perangkat medis selama lebih dari tujuh tahun.',
            'highlights' => [
                'Mengelola drawing teknis, toleransi, dan revisi desain bersama tim produksi.',
                'Melakukan design review dengan supplier untuk memastikan proses manufaktur berjalan stabil.',
                'Menjadi penghubung antara kebutuhan produksi dan solusi digitalisasi proses.',
            ],
            'current' => true,
        ],
        [
            'period' => '2024 — Sekarang',
            'title' => 'Mahasiswa Informatika',
            'organization' => 'Universitas Ciputra',
            'description' => 'Memperdalam software engineering, basis data, dan pengembangan aplikasi web untuk melengkapi latar belakang rekayasa mekanikal.',
            'highlights' => [
                'Mengerjakan proyek akademik berbasis Laravel dan pengembangan web modern.',
                'Menggabungkan studi Informatika dengan pengalaman industri manufaktur.',
            ],
            'current' => true,
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Keahlian Terkelompok (About)
    |--------------------------------------------------------------------------
    */

    'skill_groups' => [
        [
            'title' => 'Software & Web',
            'icon' => 'code',
            'skills' => ['Laravel', 'PHP', 'Blade', 'JavaScript', 'Tailwind CSS', 'MySQL', 'Git & GitHub'],
        ],
        [
            'title' => 'Mechanical Design',
            'icon' => 'wrench',
            'skills' => ['SolidWorks', 'Sheet Metal Design', 'GD&T', 'Fixture & Jig', 'Technical Drawing', 'Design Review'],
        ],
        [
            'title' => 'Spatial Computing',
            'icon' => 'vr',
            'skills' => ['Unity', 'C#', 'AR Foundation', 'OpenXR', 'Blender', 'Substance Painter'],
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Kategori Portofolio
    |--------------------------------------------------------------------------
    |
    | Urutan kategori dipakai untuk tombol filter pada halaman Portfolio.
    |
    */

    'portfolio_categories' => ['AR', '3D Modeling', 'VR', 'Rendering'],

    /*
    |--------------------------------------------------------------------------
    | Kanal Kontak
    |--------------------------------------------------------------------------
    */

    'contact_channels' => [
        [
            'label' => 'Email',
            'value' => 'anggasaputra@deepspacespatial.com',
            'href' => 'mailto:anggasaputra@deepspacespatial.com',
            'icon' => 'mail',
            'description' => 'Cara tercepat untuk menghubungi saya.',
        ],
        [
            'label' => 'GitHub',
            'value' => 'github.com/silumankucing',
            'href' => 'https://github.com/silumankucing',
            'icon' => 'github',
            'description' => 'Repositori dan eksperimen kode yang sedang saya kerjakan.',
        ],
    ],

];
