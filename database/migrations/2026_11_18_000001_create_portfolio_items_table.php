<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Tabel portofolio.
 *
 * Menyimpan daftar karya/proyek yang nantinya ditampilkan pada halaman
 * Portfolio melalui perulangan Blade (@foreach) di PortfolioController.
 */
return new class extends Migration
{
    public function up(): void
    {
        Schema::create('portfolio_items', function (Blueprint $table) {
            $table->id();
            $table->string('title');                       // Judul proyek
            $table->string('category');                    // AR, VR, 3D Modeling, Rendering
            $table->string('image');                       // Path gambar di folder public/images
            $table->text('description');                   // Ringkasan proyek
            $table->json('tech_stack');                    // Daftar tools/teknologi (array -> JSON)
            $table->string('year', 9);                     // Tahun pengerjaan
            $table->boolean('is_featured')->default(false); // Tampil di halaman Home
            $table->unsignedSmallInteger('sort_order')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('portfolio_items');
    }
};
