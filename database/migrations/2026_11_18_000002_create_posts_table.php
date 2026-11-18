<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Tabel artikel blog.
 *
 * Kolom "content" menyimpan blok konten terstruktur (JSON) sehingga detail
 * artikel dapat dirender dengan Blade tanpa menulis HTML berulang.
 */
return new class extends Migration
{
    public function up(): void
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();              // Dipakai untuk URL /blog/{slug}
            $table->string('category');
            $table->string('cover_image');
            $table->text('excerpt');                       // Ringkasan artikel
            $table->json('content');                       // Blok konten artikel
            $table->string('author')->default('Angga Saputra');
            $table->unsignedTinyInteger('read_time')->default(5); // Estimasi menit baca
            $table->timestamp('published_at');
            $table->boolean('is_featured')->default(false);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
