<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;

/**
 * Menampilkan halaman About (profil lengkap pemilik website).
 */
class AboutController extends Controller
{
    public function __invoke(): View
    {
        return view('about', [
            'owner' => config('site.owner'),
            'expertise' => config('site.expertise'),
            'experience' => config('site.experience'),
            'skillGroups' => config('site.skill_groups'),
        ]);
    }
}
