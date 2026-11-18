<?php

namespace Tests\Feature;

use App\Models\PortfolioItem;
use App\Models\Post;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PageRenderingTest extends TestCase
{
    use RefreshDatabase;

    public function test_home_page_renders(): void
    {
        $this->portfolioItem(['title' => 'Proyek Unggulan', 'is_featured' => true]);
        $this->createPost(['title' => 'Artikel Terbaru']);

        $this->get('/')
            ->assertOk()
            ->assertSee(config('site.owner.name'))
            ->assertDontSee('Software · Mechanical')
            ->assertDontSee('Hubungi Saya')
            ->assertDontSee('Proyek Unggulan')
            ->assertDontSee('Artikel Terbaru')
            ->assertDontSee('Tiga disiplin, satu cara berpikir.')
            ->assertDontSee('Proyek pilihan.')
            ->assertDontSee('Catatan terbaru.')
            ->assertDontSee('Lihat Portofolio')
            ->assertDontSee('Baca Blog')
            ->assertDontSee('Tentang Saya')
            ->assertDontSee('Portfolio / 2026')
            ->assertDontSee('Halo, saya')
            ->assertDontSee('Tahun sebagai Mechanical Design Engineer')
            ->assertDontSee('Seluruh hak cipta')
            ->assertDontSee('Terbuka untuk kolaborasi')
            ->assertDontSee('Menjembatani rekayasa fisik');
    }

    public function test_about_page_renders_profile_and_experience(): void
    {
        $this->get('/about')
            ->assertOk()
            ->assertSee(config('site.owner.name'))
            ->assertSee('Universitas Ciputra')
            ->assertSee('Mechanical Design')
            ->assertDontSee('Tentang saya.')
            ->assertDontSee(config('site.owner.availability'))
            ->assertDontSee(config('site.owner.student_profile'))
            ->assertDontSee('Tahun sebagai Mechanical Design Engineer')
            ->assertDontSee('Proyek portofolio AR, VR, 3D')
            ->assertDontSee('Lihat Portofolio')
            ->assertDontSee('Baca Blog')
            ->assertDontSee('membangun jembatan')
            ->assertDontSee('Kolaborasi');
    }

    public function test_portfolio_page_lists_every_item(): void
    {
        $this->portfolioItem(['title' => 'Proyek Augmented Reality', 'category' => 'AR']);
        $this->portfolioItem(['title' => 'Proyek Virtual Reality', 'category' => 'VR']);

        $this->get('/portfolio')
            ->assertOk()
            ->assertSee('Proyek Augmented Reality')
            ->assertSee('Proyek Virtual Reality')
            ->assertDontSee('Filter kategori')
            ->assertDontSee('Proyek pilihan.')
            ->assertDontSee('persimpangan')
            ->assertDontSee('tantangan visualisasi');
    }

    public function test_portfolio_page_can_filter_by_category(): void
    {
        $this->portfolioItem(['title' => 'Proyek Augmented Reality', 'category' => 'AR']);
        $this->portfolioItem(['title' => 'Proyek Virtual Reality', 'category' => 'VR']);

        $this->get('/portfolio?category=AR')
            ->assertOk()
            ->assertSee('Proyek Augmented Reality')
            ->assertDontSee('Proyek Virtual Reality');
    }

    public function test_portfolio_page_ignores_unknown_category(): void
    {
        $this->portfolioItem(['title' => 'Proyek Augmented Reality', 'category' => 'AR']);

        $this->get('/portfolio?category=TidakAda')
            ->assertOk()
            ->assertSee('Proyek Augmented Reality');
    }

    public function test_blog_index_shows_featured_post_and_others(): void
    {
        $this->createPost(['title' => 'Artikel Unggulan', 'is_featured' => true, 'published_at' => now()->subDay()]);
        $this->createPost(['title' => 'Artikel Biasa', 'published_at' => now()->subDays(2)]);

        $this->get('/blog')
            ->assertOk()
            ->assertSee('Artikel Unggulan')
            ->assertSee('Artikel Biasa')
            ->assertDontSee('Catatan terbaru.')
            ->assertDontSee('Tulisan pendek tentang hal-hal di luar pekerjaan.');
    }

    public function test_blog_index_can_filter_by_category(): void
    {
        $this->createPost(['title' => 'Artikel Catatan', 'category' => 'Catatan']);
        $this->createPost(['title' => 'Artikel Perjalanan', 'category' => 'Perjalanan']);

        $this->get('/blog?category=Catatan')
            ->assertOk()
            ->assertSee('Artikel Catatan')
            ->assertDontSee('Artikel Perjalanan')
            ->assertDontSee('berkolaborasi');
    }

    public function test_blog_detail_renders_article_blocks_and_related_posts(): void
    {
        $post = $this->createPost([
            'title' => 'Membangun Prototipe AR',
            'slug' => 'membangun-prototipe-ar',
            'content' => [
                ['type' => 'paragraph', 'text' => 'Paragraf pembuka artikel.'],
                ['type' => 'heading', 'text' => 'Langkah Pertama'],
                ['type' => 'list', 'items' => ['Siapkan model', 'Uji di perangkat']],
                ['type' => 'quote', 'text' => 'Prototipe cepat lebih berharga daripada rencana panjang.'],
                ['type' => 'code', 'language' => 'php', 'code' => 'echo "hello";'],
            ],
        ]);
        $this->createPost(['title' => 'Artikel Terkait', 'category' => $post->category]);

        $this->get('/blog/'.$post->slug)
            ->assertOk()
            ->assertSee('Paragraf pembuka artikel.')
            ->assertSee('Langkah Pertama')
            ->assertSee('Siapkan model')
            ->assertSee('Prototipe cepat lebih berharga')
            ->assertSee('Artikel Terkait');
    }

    public function test_future_posts_are_hidden(): void
    {
        $future = $this->createPost([
            'title' => 'Artikel Masa Depan',
            'slug' => 'artikel-masa-depan',
            'published_at' => now()->addWeek(),
        ]);

        $this->get('/blog')->assertOk()->assertDontSee('Artikel Masa Depan');
        $this->get('/blog/'.$future->slug)->assertNotFound();
    }

    public function test_contact_page_only_lists_email_and_github(): void
    {
        $this->get('/contact')
            ->assertOk()
            ->assertSee(config('site.owner.email'))
            ->assertSee(config('site.owner.github_url'))
            ->assertDontSee('Email & GitHub', false)
            ->assertDontSee('Mari bicarakan')
            ->assertDontSee('Kirim pesan')
            ->assertDontSee('Waktu respons')
            ->assertDontSee('name="subject"', false)
            ->assertDontSee('name="message"', false);
    }

    /**
     * @param  array<string, mixed>  $attributes
     */
    private function portfolioItem(array $attributes = []): PortfolioItem
    {
        return PortfolioItem::query()->create(array_merge([
            'title' => 'Proyek Uji',
            'category' => 'AR',
            'image' => 'images/portfolio/demo.jpg',
            'description' => 'Deskripsi proyek uji.',
            'tech_stack' => ['Unity', 'C#'],
            'year' => '2025',
            'is_featured' => false,
            'sort_order' => 0,
        ], $attributes));
    }

    /**
     * @param  array<string, mixed>  $attributes
     */
    private function createPost(array $attributes = []): Post
    {
        $title = $attributes['title'] ?? 'Artikel Uji';

        return Post::query()->create(array_merge([
            'title' => $title,
            'slug' => str($title)->slug()->toString(),
            'category' => 'VR',
            'cover_image' => 'images/blog/demo.jpg',
            'excerpt' => 'Ringkasan artikel uji.',
            'content' => [['type' => 'paragraph', 'text' => 'Isi artikel uji.']],
            'author' => 'Angga Saputra',
            'read_time' => 4,
            'published_at' => now()->subDay(),
            'is_featured' => false,
        ], $attributes));
    }
}
