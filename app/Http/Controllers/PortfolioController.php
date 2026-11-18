<?php

namespace App\Http\Controllers;

use App\Models\PortfolioItem;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

/**
 * Menampilkan halaman Portfolio.
 *
 * Mendukung filter kategori melalui query string (?category=AR) dan
 * mengirim daftar item ke view untuk dirender dengan @foreach.
 */
class PortfolioController extends Controller
{
    public function __invoke(Request $request): View
    {
        $categories = config('site.portfolio_categories');
        $activeCategory = $request->string('category')->trim()->toString();

        // Abaikan kategori yang tidak dikenal agar filter tetap aman.
        if (! in_array($activeCategory, $categories, true)) {
            $activeCategory = null;
        }

        $items = PortfolioItem::query()
            ->inCategory($activeCategory)
            ->ordered()
            ->get();

        // Hitung jumlah proyek per kategori untuk badge pada tombol filter.
        $categoryCounts = PortfolioItem::query()
            ->selectRaw('category, count(*) as total')
            ->groupBy('category')
            ->pluck('total', 'category');

        return view('portfolio.index', [
            'items' => $items,
            'categories' => $categories,
            'activeCategory' => $activeCategory,
            'categoryCounts' => $categoryCounts,
            'totalItems' => PortfolioItem::query()->count(),
        ]);
    }
}
