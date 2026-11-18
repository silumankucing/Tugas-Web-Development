<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

/**
 * Menampilkan daftar dan detail artikel blog.
 */
class BlogController extends Controller
{
    /**
     * Halaman daftar artikel, mendukung filter kategori (?category=VR).
     */
    public function index(Request $request): View
    {
        $categories = Post::query()->published()->distinct()->orderBy('category')->pluck('category');
        $activeCategory = $request->string('category')->trim()->toString();

        if (! $categories->contains($activeCategory)) {
            $activeCategory = null;
        }

        $query = Post::query()->published()->inCategory($activeCategory);

        $featuredPost = (clone $query)
            ->where('is_featured', true)
            ->latest('published_at')
            ->first();

        $posts = $query
            ->when($featuredPost, fn ($builder) => $builder->whereKeyNot($featuredPost->getKey()))
            ->latest('published_at')
            ->get();

        return view('blog.index', [
            'categories' => $categories,
            'activeCategory' => $activeCategory,
            'featuredPost' => $featuredPost,
            'posts' => $posts,
            'totalPosts' => Post::query()->published()->count(),
        ]);
    }

    /**
     * Halaman detail artikel berdasarkan slug (/blog/{slug}).
     */
    public function show(Post $post): View
    {
        abort_if($post->published_at->isFuture(), 404);

        return view('blog.show', [
            'post' => $post,
            'relatedPosts' => $this->relatedPosts($post),
        ]);
    }

    /**
     * Ambil artikel terkait; lengkapi dengan artikel terbaru bila kategori
     * yang sama belum memiliki cukup artikel.
     */
    private function relatedPosts(Post $post): Collection
    {
        $related = $post->relatedPosts(2);

        if ($related->count() < 2) {
            $fallback = Post::query()
                ->published()
                ->whereKeyNot($post->getKey())
                ->whereNotIn('id', $related->pluck('id'))
                ->latest('published_at')
                ->take(2 - $related->count())
                ->get();

            $related = $related->concat($fallback);
        }

        return $related;
    }
}
