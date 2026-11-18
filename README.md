# Portfolio Website — Angga Saputra

Portfolio Website Angga Saputra adalah situs portofolio pribadi yang dibangun dengan Laravel, Blade, Tailwind CSS v4, dan Vite. Situs ini menampilkan profil profesional, karya AR/VR/3D modeling dan rendering, artikel blog, serta informasi kontak dalam tema gelap navy dengan aksen biru dan font Oxanium; data portofolio dan blog disimpan di database SQLite yang diisi melalui seeder.

Untuk menjalankan proyek, pastikan PHP 8.3+, Composer, Node.js, dan npm sudah terpasang, lalu jalankan perintah berikut dari direktori proyek. Perintah ini memasang dependensi, menyiapkan environment dan application key, membuat database SQLite beserta data contoh, membangun aset produksi, dan menjalankan server di `http://127.0.0.1:8000`; untuk pengembangan dengan hot reload, gunakan `npm run dev` pada terminal terpisah.

```bash
composer install
npm install
cp .env.example .env      # Windows: copy .env.example .env
php artisan key:generate
php -r "file_exists('database/database.sqlite') || touch('database/database.sqlite');"
php artisan migrate:fresh --seed
npm run build
php artisan serve
```
