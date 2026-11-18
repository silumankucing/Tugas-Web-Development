<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Scope;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Model artikel blog.
 *
 * Konten artikel disimpan sebagai array blok (heading, paragraph, list, quote,
 * code) sehingga dapat dirender secara dinamis oleh komponen Blade
 * <x-article-content /> pada halaman detail.
 */
#[Fillable([
    'title',
    'slug',
    'category',
    'cover_image',
    'excerpt',
    'content',
    'author',
    'read_time',
    'published_at',
    'is_featured',
])]
class Post extends Model
{
    /**
     * Konversi tipe data kolom.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'content' => 'array',
            'published_at' => 'datetime',
            'is_featured' => 'boolean',
            'read_time' => 'integer',
        ];
    }

    /**
     * Gunakan slug sebagai kunci URL (/blog/{slug}).
     */
    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    /**
     * Hanya tampilkan artikel yang sudah dipublikasikan.
     */
    #[Scope]
    protected function published(Builder $query): void
    {
        $query->where('published_at', '<=', now());
    }

    /**
     * Filter artikel berdasarkan kategori.
     */
    #[Scope]
    protected function inCategory(Builder $query, ?string $category): void
    {
        $query->when($category, fn (Builder $builder, string $value) => $builder->where('category', $value));
    }

    /**
     * Artikel terkait: kategori yang sama, kecuali artikel yang sedang dibuka.
     */
    public function relatedPosts(int $limit = 2): Collection
    {
        return self::query()
            ->published()
            ->where('category', $this->category)
            ->whereKeyNot($this->getKey())
            ->latest('published_at')
            ->take($limit)
            ->get();
    }
}
