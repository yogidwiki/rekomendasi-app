<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MakananSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $makanan = [
            [
                'nama_makanan' => 'Bubur Ayam', 
                'resep' => '1. Masak bahan bubur seperti masak nasi biasa. Hanya airnya diperbanyak, kurang lebih 2 liter. 2. Haluskan wortel, bayam. Tumis sebentar dan tambah 1 liter air. 3. Masukkan ayam ke dalam kuah. Masak hingga lunak. Angkat ayam, potong atau suwir. 4. Ambil bubur, bubuhkan kecap manis, tata ayam dan siram kuah.', 
                'bahan' => 'Beras: 50 gram (~68 kcal), Ayam tanpa kulit: 50 gram (~80 kcal), Wortel: 30 gram (~12 kcal), Bayam: 20 gram (~5 kcal), Minyak (untuk menumis): 6 ml (~54 kcal)', 
                'gambar' => 'bubur_ayam.jpg',
                'kalori' => 230
            ],
            [
                'nama_makanan' => 'Nasi Tim Ikan', 
                'resep' => '1. Tumis bawang merah dan bawang putih dengan mentega sampai harum. 2. Tata daging ikan dalam mangkuk, tambahkan air kaldu dan kukus. 3. Tambahkan bumbu dan kaldu, masak hingga matang. 4. Kukus nasi dan tambahkan kaldu ayam sesuai keinginan. 5. Koreksi rasa dan tambahkan minyak wijen.', 
                'bahan' => 'Ikan tenggiri cincang: 70 gram (~154 kcal), Bawang merah: 5 gram (~2 kcal), Bawang putih: 2 gram (~3 kcal), Mentega: 10 gram (~72 kcal), Beras: 70 gram (~96 kcal), Minyak (untuk menumis): 15 ml (~135 kcal), Sayur bayam: 30 gram (~3 kcal)', 
                'gambar' => 'bubur_ayam.jpg',
                'kalori' => 431
            ],
            [
                'nama_makanan' => 'Bubur Kacang Hijau', 
                'resep' => '1. Cuci kacang hijau, masak dengan daun pandan dan air selama 15 menit. 2. Tambahkan jahe, gula pasir, gula merah, dan santan, masak hingga mendidih. 3. Sajikan.', 
                'bahan' => 'Kacang hijau: 80 gram (~256 kcal), Santan: 30 ml (~45 kcal), Gula pasir: 10 gram (~39 kcal), Air: 100 ml, Daun pandan: secukupnya', 
                'gambar' => 'bubur_ayam.jpg',
                'kalori' => 370
            ],
            [
                'nama_makanan' => 'Sup Sayur Tofu', 
                'resep' => '1. Didihkan air, masukkan wortel dan bawang putih. 2. Tambahkan tofu dan bumbu. 3. Masak selama 5 menit dan sajikan.', 
                'bahan' => 'Tofu: 80 gram (~64 kcal), Wortel: 30 gram (~12 kcal), Bawang putih: 3 gram (~5 kcal), Air: 150 ml, Minyak (untuk menumis): 7 ml (~63 kcal)', 
                'gambar' => 'bubur_ayam.jpg',
                'kalori' => 152
            ],
            [
                'nama_makanan' => 'Puree Kentang', 
                'resep' => '1. Rebus kentang yang sudah dipotong dadu. 2. Tumbuk kentang dan campurkan mentega dan susu. 3. Sajikan dengan hiasan tomat dan seledri.', 
                'bahan' => 'Kentang: 70 gram (~108 kcal), Mentega: 5 gram (~36 kcal), Susu: 30 ml (~15 kcal)', 
                'gambar' => 'bubur_ayam.jpg',
                'kalori' => 169
            ],
            [
                'nama_makanan' => 'Nasi Tim Ayam Brokoli', 
                'resep' => '1. Kukus beras, ayam, dan brokoli bersama. 2. Tumis bawang dan masukkan daging ayam. 3. Tambahkan sayuran dan nasi, aduk hingga matang. 4. Blender sayuran dan campurkan kembali dengan nasi tim. Sajikan.', 
                'bahan' => 'Beras: 60 gram (~82 kcal), Ayam tanpa kulit: 50 gram (~80 kcal), Brokoli: 35 gram (~13 kcal), Labu siam: 30 gram (~11 kcal), Minyak (untuk menumis): 10 ml (~45 kcal)', 
                'gambar' => 'bubur_ayam.jpg',
                'kalori' => 230
            ],
            [
                'nama_makanan' => 'Sup Ayam Jagung', 
                'resep' => '1. Didihkan air dengan bawang putih dan ayam. 2. Masukkan jagung dan wortel, masak hingga matang. 3. Tambahkan bumbu dan sajikan.', 
                'bahan' => 'Ayam tanpa kulit: 70 gram (~112 kcal), Jagung manis: 40 gram (~36 kcal), Air: 150 ml, Bawang putih: 3 gram (~5 kcal), Wortel: 30 gram (~12 kcal)', 
                'gambar' => 'bubur_ayam.jpg',
                'kalori' => 176
            ],
            [
                'nama_makanan' => 'Nasi Tim Hati Ayam', 
                'resep' => '1. Rebus hati ayam, lalu tumis bersama bawang. 2. Kukus beras dan tambahkan hati ayam serta sayuran. 3. Sajikan.', 
                'bahan' => 'Beras putih: 50 gram (~68 kcal), Hati ayam: 40 gram (~80 kcal), Brokoli: 35 gram (~12 kcal), Wortel: 30 gram (~12 kcal), Minyak (untuk menumis): 10 ml (~45 kcal)', 
                'gambar' => 'bubur_ayam.jpg',
                'kalori' => 212
            ],
            [
                'nama_makanan' => 'Sup Krim Jagung', 
                'resep' => '1. Didihkan air dengan bawang putih dan ayam. 2. Masukkan wortel dan jagung, tambahkan krim dan masak hingga kental. 3. Sajikan.', 
                'bahan' => 'Jagung manis: 30 gram (~27 kcal), Ayam tanpa kulit: 50 gram (~80 kcal), Air: 150 ml, Wortel: 30 gram (~12 kcal), Bawang putih: 3 gram (~5 kcal), Krim cair: 20 ml (~32 kcal)', 
                'gambar' => 'bubur_ayam.jpg',
                'kalori' => 156
            ],
            [
                'nama_makanan' => 'Bubur Ayam Wortel', 
                'resep' => '1. Masak ayam hingga matang. 2. Tumis wortel dan tambahkan nasi, santan, dan bumbu. 3. Blender dan sajikan.', 
                'bahan' => 'Beras: 50 gram (~68 kcal), Ayam tanpa kulit: 45 gram (~72 kcal), Wortel: 30 gram (~12 kcal), Santan: 20 ml (~30 kcal), Minyak (untuk menumis): 10 ml (~45 kcal)', 
                'gambar' => 'bubur_ayam.jpg',
                'kalori' => 229
            ],
            [
                'nama_makanan' => 'Bubur Jagung Manis', 
                'resep' => '1. Blender jagung dengan air, saring, dan masak dengan santan dan gula. 2. Tambahkan larutan maizena, aduk hingga matang. Sajikan.', 
                'bahan' => 'Jagung manis: 55 gram (~49 kcal), Gula pasir: 10 gram (~39 kcal), Santan: 30 ml (~45 kcal), Air: 150 ml, Tepung tapioka/maizena: 10 gram (~36 kcal)', 
                'gambar' => 'bubur_ayam.jpg',
                'kalori' => 178
            ],
            [
                'nama_makanan' => 'Bubur Sumsum', 
                'resep' => '1. Masak tepung beras dengan santan dan air hingga kental. 2. Buat kuah gula merah dan sajikan dengan bubur sumsum.', 
                'bahan' => 'Tepung beras: 70 gram (~252 kcal), Santan: 60 ml (~90 kcal), Gula merah: 30 gram (~115 kcal), Daun pandan: secukupnya, Air: 200 ml', 
                'gambar' => 'bubur_ayam.jpg',
                'kalori' => 457
            ]
        ];        
        foreach ($makanan as $item) {
            DB::table('makanan')->insert($item);
        }
    }
}
