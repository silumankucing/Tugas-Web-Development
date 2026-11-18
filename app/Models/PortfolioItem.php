<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Scope;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

/**
 * Model portofolio.
 *
 * Setiap baris merepresentasikan satu karya yang ditampilkan pada halaman
 * Portfolio dan ringkasannya pada halaman Home.
 */
#[Fillable(['title', 'category', 'image', 'description', 'tech_stack', 'year', 'is_featured', 'sort_order'])]
class PortfolioItem extends Model
{
    /**
     * Konversi tipe data kolom.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'tech_stack' => 'array',
            'is_featured' => 'boolean',
            'sort_order' => 'integer',
        ];
    }

    /**
     * Urutkan portofolio berdasarkan urutan tampil lalu tahun terbaru.
     */
    #[Scope]
    protected function ordered(Builder $query): void
    {
        $query->orderBy('sort_order')->orderByDesc('year');
    }

    /**
     * Filter portofolio berdasarkan kategori (dipakai halaman Portfolio).
     */
    #[Scope]
    protected function inCategory(Builder $query, ?string $category): void
    {
        $query->when($category, fn (Builder $builder, string $value) => $builder->where('category', $value));
    }

    /**
     * Hanya ambil portofolio yang ditampilkan di halaman Home.
     */
    #[Scope]
    protected function featured(Builder $query): void
    {
        $query->where('is_featured', true);
    }
}
