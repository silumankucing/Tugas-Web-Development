<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;

/**
 * Menampilkan halaman utama (Home).
 *
 * Halaman ini hanya berisi hero profil pemilik website.
 */
class HomeController extends Controller
{
    public function __invoke(): View
    {
        return view('home', [
            'owner' => config('site.owner'),
        ]);
    }
}
