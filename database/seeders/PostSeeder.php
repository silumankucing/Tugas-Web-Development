<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Seeder;

/**
 * Data dummy artikel blog.
 *
 * Seluruh artikel bersifat fiktif dan tidak membahas portofolio. Tujuannya
 * hanya mengisi halaman blog dengan konten contoh yang wajar.
 */
class PostSeeder extends Seeder
{
    public function run(): void
    {
        Post::query()->delete();

        $posts = [
            [
                'title' => 'Pagi yang Lambat di Kedai Kopi Jalan Bungur',
                'slug' => 'pagi-yang-lambat-di-kedai-kopi',
                'category' => 'Cerita',
                'cover_image' => 'images/blog/pagi-kopi.svg',
                'excerpt' => 'Hujan turun sejak subuh, dan saya memutuskan untuk tidak terburu-buru. Ini catatan kecil tentang pagi yang sengaja dibuat lambat.',
                'author' => 'Angga Saputra',
                'read_time' => 5,
                'published_at' => '2026-11-12 08:00:00',
                'is_featured' => true,
                'content' => [
                    [
                        'type' => 'paragraph',
                        'text' => 'Kedai kopi di Jalan Bungur baru buka ketika saya tiba. Kursinya masih terbalik di atas meja, dan aroma roti baru mulai keluar dari dapur. Saya memilih duduk dekat jendela karena di luar hujan turun pelan-pelan.',
                    ],
                    [
                        'type' => 'heading',
                        'text' => 'Berangkat lebih awal',
                    ],
                    [
                        'type' => 'paragraph',
                        'text' => 'Biasanya saya datang ke tempat ini dengan laptop dan daftar pekerjaan. Hari itu saya sengaja meninggalkan semuanya di rumah. Tidak ada notifikasi, tidak ada target, hanya secangkir kopi dan suara hujan yang sesekali menabrak kanopi.',
                    ],
                    [
                        'type' => 'list',
                        'items' => [
                            'Memperhatikan cara barista menyiapkan espresso tanpa terburu-buru.',
                            'Mendengar percakapan ringan penghuni sekitar yang juga berteduh.',
                            'Membiarkan pikiran kosong tanpa layar selama satu jam penuh.',
                        ],
                    ],
                    [
                        'type' => 'quote',
                        'text' => 'Tidak semua pagi perlu dimulai dengan daftar tugas.',
                    ],
                    [
                        'type' => 'paragraph',
                        'text' => 'Sekitar satu jam kemudian hujan berhenti. Saya membayar, berjalan pulang, dan menyadari bahwa tidak melakukan apa-apa ternyata juga bagian dari hari yang cukup produktif.',
                    ],
                ],
            ],
            [
                'title' => 'Menata Meja Kerja Kecil di Sudut Kamar',
                'slug' => 'menata-meja-kerja-kecil',
                'category' => 'Catatan',
                'cover_image' => 'images/blog/meja-kerja.svg',
                'excerpt' => 'Meja saya hanya selebar satu meter, tetapi cukup untuk bekerja dengan tenang. Ini beberapa hal yang saya ubah.',
                'author' => 'Angga Saputra',
                'read_time' => 4,
                'published_at' => '2026-10-30 09:30:00',
                'is_featured' => false,
                'content' => [
                    [
                        'type' => 'paragraph',
                        'text' => 'Selama beberapa bulan, meja kerja saya penuh kabel, gelas, dan kertas catatan yang tidak pernah selesai dibaca. Setiap kali ingin mulai bekerja, saya menghabiskan sepuluh menit pertama hanya untuk mencari ruang kosong.',
                    ],
                    [
                        'type' => 'heading',
                        'text' => 'Mulai dari membuang',
                    ],
                    [
                        'type' => 'paragraph',
                        'text' => 'Perubahan pertama bukan membeli barang baru, melainkan memindahkan barang yang tidak dipakai. Saya menyisakan benda yang benar-benar disentuh setiap hari, lalu menyimpan sisanya di satu kotak.',
                    ],
                    [
                        'type' => 'list',
                        'items' => [
                            'Menyisakan satu lampu, satu tanaman kecil, dan satu gelas.',
                            'Menyembunyikan kabel di belakang meja dengan pengikat sederhana.',
                            'Menyimpan alat tulis di satu kotak yang mudah dijangkau.',
                        ],
                    ],
                    [
                        'type' => 'paragraph',
                        'text' => 'Hasilnya tidak dramatis, tetapi cukup terasa. Meja yang lega membuat saya lebih cepat duduk dan mulai, tanpa perlu memindahkan tumpukan kertas terlebih dahulu.',
                    ],
                    [
                        'type' => 'quote',
                        'text' => 'Meja yang rapi bukan soal estetika, tetapi soal mengurangi keputusan kecil.',
                    ],
                    [
                        'type' => 'paragraph',
                        'text' => 'Sekarang saya mencoba mempertahankannya dengan aturan sederhana: sebelum meninggalkan meja, tidak boleh ada gelas kotor atau kabel yang terurai.',
                    ],
                ],
            ],
            [
                'title' => 'Tiga Hari di Bandung Tanpa Rencana',
                'slug' => 'tiga-hari-di-bandung',
                'category' => 'Perjalanan',
                'cover_image' => 'images/blog/bandung.svg',
                'excerpt' => 'Tidak ada itinerary, hanya tiket kereta dan satu tas kecil. Ternyata perjalanan tanpa rencana punya ritmenya sendiri.',
                'author' => 'Angga Saputra',
                'read_time' => 6,
                'published_at' => '2026-10-18 10:00:00',
                'is_featured' => false,
                'content' => [
                    [
                        'type' => 'paragraph',
                        'text' => 'Saya membeli tiket kereta pada malam sebelumnya, tanpa memesan penginapan dan tanpa mencari daftar tempat wisata. Keputusan itu terasa sedikit ceroboh, tetapi juga melegakan.',
                    ],
                    [
                        'type' => 'heading',
                        'text' => 'Hari pertama',
                    ],
                    [
                        'type' => 'paragraph',
                        'text' => 'Setibanya di stasiun, saya berjalan tanpa arah sampai menemukan penginapan kecil di gang samping. Pemiliknya menyarankan tiga tempat yang tidak ada di daftar pencarian saya, dan semuanya ternyata menarik.',
                    ],
                    [
                        'type' => 'list',
                        'items' => [
                            'Jalan Braga pada pagi hari, sebelum toko-toko dibuka.',
                            'Kedai kecil di dekat pasar yang hanya menjual satu jenis mi.',
                            'Taman kota tempat orang berlatih musik pada sore hari.',
                        ],
                    ],
                    [
                        'type' => 'quote',
                        'text' => 'Rencana yang terlalu rapi kadang menutup pintu-pintu kecil yang menarik.',
                    ],
                    [
                        'type' => 'paragraph',
                        'text' => 'Pada hari ketiga, saya sudah punya rutinitas sendiri: kopi di tempat yang sama, berjalan ke arah yang belum pernah dilewati, lalu pulang saat langit mulai gelap. Tidak ada yang istimewa, tetapi justru itu yang membuatnya berkesan.',
                    ],
                ],
            ],
            [
                'title' => 'Buku yang Selesai dalam Satu Akhir Pekan',
                'slug' => 'buku-selesai-dalam-satu-akhir-pekan',
                'category' => 'Buku',
                'cover_image' => 'images/blog/buku.svg',
                'excerpt' => 'Saya jarang membaca secepat ini. Buku tipis tentang seorang penjaga toko membuat saya lupa waktu.',
                'author' => 'Angga Saputra',
                'read_time' => 4,
                'published_at' => '2026-10-02 19:00:00',
                'is_featured' => false,
                'content' => [
                    [
                        'type' => 'paragraph',
                        'text' => 'Buku itu saya beli karena sampulnya sederhana dan harganya murah. Tidak ada ekspektasi apa pun. Sabtu pagi saya membuka halaman pertama, dan Minggu malam saya sudah berada di halaman terakhir.',
                    ],
                    [
                        'type' => 'heading',
                        'text' => 'Kenapa buku ini menempel',
                    ],
                    [
                        'type' => 'paragraph',
                        'text' => 'Ceritanya tidak rumit. Seorang penjaga toko kecil menghabiskan hari-harinya mengamati pelanggan dan mencatat hal-hal sepele. Tetapi detail-detail kecil itulah yang membuat saya terus membaca.',
                    ],
                    [
                        'type' => 'list',
                        'items' => [
                            'Kalimatnya pendek dan tidak berusaha terdengar pintar.',
                            'Tokohnya terasa nyata, termasuk kebiasaan-kebiasaan kecilnya.',
                            'Setiap bab punya satu momen yang membuat saya berhenti sebentar.',
                        ],
                    ],
                    [
                        'type' => 'quote',
                        'text' => 'Buku yang baik tidak selalu mengubah hidup; kadang cukup membuat satu akhir pekan terasa berbeda.',
                    ],
                    [
                        'type' => 'paragraph',
                        'text' => 'Setelah menutup buku, saya menyimpannya di rak dekat jendela. Bukan karena ingin membacanya lagi segera, tetapi karena saya ingin mengingat perasaan tenang yang muncul saat membacanya.',
                    ],
                ],
            ],
            [
                'title' => 'Musik untuk Bekerja Tanpa Distraksi',
                'slug' => 'musik-untuk-bekerja-tanpa-distraksi',
                'category' => 'Opini',
                'cover_image' => 'images/blog/musik.svg',
                'excerpt' => 'Playlist favorit tidak selalu membantu. Kadang yang dibutuhkan justru suara ruangan.',
                'author' => 'Angga Saputra',
                'read_time' => 5,
                'published_at' => '2026-09-20 14:00:00',
                'is_featured' => false,
                'content' => [
                    [
                        'type' => 'paragraph',
                        'text' => 'Untuk waktu yang lama, saya percaya bahwa bekerja harus ditemani musik. Semakin cepat tempo lagunya, semakin cepat pula pekerjaan selesai. Anggapan itu ternyata tidak selalu benar.',
                    ],
                    [
                        'type' => 'heading',
                        'text' => 'Lirik mengganggu',
                    ],
                    [
                        'type' => 'paragraph',
                        'text' => 'Saat membaca atau menulis, lirik lagu sering mengambil alih perhatian. Tanpa sadar saya mengikuti kalimatnya, lalu kehilangan bagian terakhir dari apa yang baru saja saya baca.',
                    ],
                    [
                        'type' => 'list',
                        'items' => [
                            'Gunakan musik tanpa lirik untuk pekerjaan yang butuh konsentrasi.',
                            'Turunkan volume sampai hampir tidak terdengar.',
                            'Coba bekerja dalam keheningan selama satu jam dan bandingkan hasilnya.',
                        ],
                    ],
                    [
                        'type' => 'quote',
                        'text' => 'Kadang yang kita butuhkan bukan suasana baru, melainkan lebih sedikit suara.',
                    ],
                    [
                        'type' => 'paragraph',
                        'text' => 'Sekarang saya memilih musik hanya ketika pekerjaannya repetitif. Untuk membaca dan menulis, saya membuka jendela dan membiarkan suara kendaraan di luar menjadi latar yang cukup.',
                    ],
                ],
            ],
            [
                'title' => 'Belajar Memasak Nasi Goreng Tanpa Resep',
                'slug' => 'belajar-memasak-nasi-goreng',
                'category' => 'Hobi',
                'cover_image' => 'images/blog/nasi-goreng.svg',
                'excerpt' => 'Kali pertama gagal karena terlalu banyak kecap. Kali kedua saya mulai mendengar suara wajan.',
                'author' => 'Angga Saputra',
                'read_time' => 5,
                'published_at' => '2026-09-08 18:30:00',
                'is_featured' => false,
                'content' => [
                    [
                        'type' => 'paragraph',
                        'text' => 'Saya tidak pernah belajar memasak secara serius. Selama bertahun-tahun, nasi goreng saya hanya cukup untuk dimakan sendiri, tanpa pernah benar-benar enak. Suatu malam saya memutuskan untuk mencoba tanpa melihat resep.',
                    ],
                    [
                        'type' => 'heading',
                        'text' => 'Bahan yang selalu ada',
                    ],
                    [
                        'type' => 'paragraph',
                        'text' => 'Di dapur hanya ada nasi sisa, telur, bawang, dan kecap. Tidak ada bahan istimewa, jadi saya fokus pada urutan memasaknya: bawang ditumis lebih dulu, telur dimasukkan saat wajan sudah panas, dan nasi baru ditambahkan setelahnya.',
                    ],
                    [
                        'type' => 'list',
                        'items' => [
                            'Panaskan wajan sebelum memasukkan apa pun.',
                            'Jangan menuang kecap langsung dari botol; takar di sendok.',
                            'Aduk nasi dengan gerakan cepat agar tidak menempel.',
                        ],
                    ],
                    [
                        'type' => 'quote',
                        'text' => 'Memasak tanpa resep memaksa kita mendengarkan wajan, bukan mengikuti angka di kertas.',
                    ],
                    [
                        'type' => 'paragraph',
                        'text' => 'Hasilnya belum sempurna, tetapi jauh lebih baik dari percobaan sebelumnya. Yang paling berubah bukan rasanya, melainkan cara saya memperhatikan proses. Malam berikutnya saya mencoba lagi, dan kali ini saya tahu kapan harus mengecilkan api.',
                    ],
                ],
            ],
            [
                'title' => 'Kenapa Saya Mulai Menulis Catatan Harian',
                'slug' => 'menulis-catatan-harian',
                'category' => 'Catatan',
                'cover_image' => 'images/blog/catatan-harian.svg',
                'excerpt' => 'Bukan untuk dibaca orang lain, hanya untuk mengingat hal-hal kecil yang biasanya hilang.',
                'author' => 'Angga Saputra',
                'read_time' => 4,
                'published_at' => '2026-08-25 20:00:00',
                'is_featured' => false,
                'content' => [
                    [
                        'type' => 'paragraph',
                        'text' => 'Saya mulai menulis catatan harian karena sering lupa apa yang terjadi minggu lalu. Bukan peristiwa besar, melainkan hal-hal kecil: percakapan di lift, cuaca sore, atau makanan yang tiba-tiba terasa enak.',
                    ],
                    [
                        'type' => 'heading',
                        'text' => 'Tiga baris sehari',
                    ],
                    [
                        'type' => 'paragraph',
                        'text' => 'Aturan saya sederhana: cukup tiga baris setiap malam. Tidak perlu kalimat yang rapi, tidak perlu menceritakan semuanya. Yang penting ada jejak yang bisa dibaca lagi nanti.',
                    ],
                    [
                        'type' => 'list',
                        'items' => [
                            'Tulis sebelum tidur, saat pikiran sudah lebih tenang.',
                            'Gunakan buku kecil agar mudah dibawa ke mana-mana.',
                            'Jangan memaksa menulis panjang jika hari itu memang biasa saja.',
                        ],
                    ],
                    [
                        'type' => 'quote',
                        'text' => 'Menulis tidak selalu tentang menghasilkan sesuatu; kadang hanya tentang memperhatikan.',
                    ],
                    [
                        'type' => 'paragraph',
                        'text' => 'Setelah beberapa bulan, saya membaca kembali halaman-halaman awal. Sebagian besar isinya remeh, tetapi justru dari situ saya bisa melihat perubahan kecil yang tidak pernah saya sadari saat menjalaninya.',
                    ],
                ],
            ],
        ];

        foreach ($posts as $post) {
            Post::query()->create($post);
        }
    }
}
