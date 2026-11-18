<?php

namespace Database\Seeders;

use App\Models\PortfolioItem;
use Illuminate\Database\Seeder;

/**
 * Data dummy portofolio.
 *
 * Gambar diambil dari folder public/images/portfolio yang berasal dari
 * folder "portfolio" pada paket tugas.
 */
class PortfolioItemSeeder extends Seeder
{
    public function run(): void
    {
        PortfolioItem::query()->delete();

        $items = [
            [
                'title' => 'AR Maintenance Overlay untuk Lini Produksi',
                'category' => 'AR',
                'image' => 'images/portfolio/porto_ar_1.jpg',
                'description' => 'Overlay instruksi perakitan berbasis marker untuk lini produksi alat medis. Teknisi melihat urutan kerja, nilai torsi, dan titik inspeksi langsung di atas unit yang sedang dirakit.',
                'tech_stack' => ['Unity', 'AR Foundation', 'C#', 'Vuforia'],
                'year' => '2025',
                'is_featured' => true,
                'sort_order' => 1,
            ],
            [
                'title' => 'AR Digital Service Manual',
                'category' => 'AR',
                'image' => 'images/portfolio/porto_ar_2.jpg',
                'description' => 'Prototipe panduan servis mesin yang menampilkan animasi komponen dan label teknis saat kamera tablet diarahkan ke peralatan.',
                'tech_stack' => ['Unity', 'ARCore', 'Blender'],
                'year' => '2024',
                'is_featured' => false,
                'sort_order' => 2,
            ],
            [
                'title' => 'Parametric Medical Device Enclosure',
                'category' => '3D Modeling',
                'image' => 'images/portfolio/porto_model3d_1.jpg',
                'description' => 'Pemodelan parametrik housing perangkat medis dengan memperhatikan DFM, toleransi, dan kemudahan perakitan agar revisi desain lebih cepat.',
                'tech_stack' => ['SolidWorks', 'GD&T', 'DFM'],
                'year' => '2026',
                'is_featured' => true,
                'sort_order' => 3,
            ],
            [
                'title' => 'Fixture & Jig untuk Quality Control',
                'category' => '3D Modeling',
                'image' => 'images/portfolio/porto_model3d_2.jpg',
                'description' => 'Desain fixture pengecekan komponen untuk proses quality control, dilengkapi drawing 2D, toleransi kritis, dan bill of materials.',
                'tech_stack' => ['SolidWorks', 'AutoCAD', 'Technical Drawing'],
                'year' => '2023',
                'is_featured' => false,
                'sort_order' => 4,
            ],
            [
                'title' => 'Photoreal Product Rendering',
                'category' => 'Rendering',
                'image' => 'images/portfolio/porto_render_1.jpg',
                'description' => 'Visualisasi produk fotorealistis untuk materi presentasi dan katalog digital, dirender dengan pencahayaan studio dan material PBR.',
                'tech_stack' => ['Blender', 'Cycles', 'Substance Painter'],
                'year' => '2026',
                'is_featured' => false,
                'sort_order' => 5,
            ],
            [
                'title' => 'Cleanroom Equipment Visualization',
                'category' => 'Rendering',
                'image' => 'images/portfolio/porto_render_2.jpg',
                'description' => 'Render eksterior dan interior peralatan cleanroom untuk kebutuhan proposal teknis serta validasi desain bersama tim produksi.',
                'tech_stack' => ['Blender', 'Eevee', 'Photoshop'],
                'year' => '2025',
                'is_featured' => false,
                'sort_order' => 6,
            ],
            [
                'title' => 'VR Operator Training Module',
                'category' => 'VR',
                'image' => 'images/portfolio/porto_vr_1.jpg',
                'description' => 'Modul pelatihan VR untuk operator cleanroom: prosedur gowning, penanganan material, dan skenario darurat dalam lingkungan simulasi.',
                'tech_stack' => ['Unity', 'OpenXR', 'C#', 'Meta Quest 3'],
                'year' => '2026',
                'is_featured' => true,
                'sort_order' => 7,
            ],
            [
                'title' => 'VR Spatial Design Review',
                'category' => 'VR',
                'image' => 'images/portfolio/porto_vr_2.jpg',
                'description' => 'Ruang review desain virtual untuk mengevaluasi tata letak lini produksi bersama tim engineering sebelum prototipe fisik dibuat.',
                'tech_stack' => ['Unity', 'OpenXR', 'Blender'],
                'year' => '2025',
                'is_featured' => false,
                'sort_order' => 8,
            ],
        ];

        foreach ($items as $item) {
            PortfolioItem::query()->create($item);
        }
    }
}
