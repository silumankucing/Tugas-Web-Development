<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PortfolioController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Seluruh halaman website publik didefinisikan di sini dan diarahkan ke
| controller masing-masing (Home, About, Portfolio, Blog, Contact).
|
*/

// A. Home
Route::get('/', HomeController::class)->name('home');

// B. About
Route::get('/about', AboutController::class)->name('about');

// C. Portfolio (mendukung filter ?category=AR)
Route::get('/portfolio', PortfolioController::class)->name('portfolio.index');

// D. Blog: daftar artikel + detail artikel berdasarkan slug
Route::get('/blog', [BlogController::class, 'index'])->name('blog.index');
Route::get('/blog/{post:slug}', [BlogController::class, 'show'])->name('blog.show');

// E. Contact: halaman informasi + pengiriman pesan
Route::get('/contact', [ContactController::class, 'index'])->name('contact.index');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');
