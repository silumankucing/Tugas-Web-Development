<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Isi database dengan data dummy portofolio dan blog.
     */
    public function run(): void
    {
        $this->call([
            PortfolioItemSeeder::class,
            PostSeeder::class,
        ]);
    }
}
