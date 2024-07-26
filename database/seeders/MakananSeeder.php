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
            ['nama_makanan' => 'Bubur Ayam', 'resep' => 'Rebus ayam, tambahkan bawang goreng, kecap, dan sambal.', 'bahan' => 'Ayam, beras, bawang goreng, kecap, sambal', 'gambar' => 'bubur_ayam.jpg', 'kalori' => 250],
            ['nama_makanan' => 'Nasi Goreng', 'resep' => 'Tumis bawang, tambahkan nasi dan kecap.', 'bahan' => 'Nasi, bawang, kecap', 'gambar' => 'nasi_goreng.jpg', 'kalori' => 300],
            ['nama_makanan' => 'Sate Ayam', 'resep' => 'Tusuk daging ayam, bakar, olesi dengan bumbu kacang.', 'bahan' => 'Daging ayam, bumbu kacang', 'gambar' => 'sate_ayam.jpg', 'kalori' => 350],
            ['nama_makanan' => 'Gado-Gado', 'resep' => 'Campurkan sayuran, tahu, tempe, dan siram dengan bumbu kacang.', 'bahan' => 'Sayuran, tahu, tempe, bumbu kacang', 'gambar' => 'gado_gado.jpg', 'kalori' => 200],
            ['nama_makanan' => 'Mie Goreng', 'resep' => 'Tumis mie dengan sayuran dan bumbu.', 'bahan' => 'Mie, sayuran, bumbu', 'gambar' => 'mie_goreng.jpg', 'kalori' => 350],
            ['nama_makanan' => 'Sop Buntut', 'resep' => 'Rebus buntut sapi dengan rempah-rempah.', 'bahan' => 'Buntut sapi, rempah-rempah', 'gambar' => 'sop_buntut.jpg', 'kalori' => 400],
            ['nama_makanan' => 'Karedok', 'resep' => 'Campurkan sayuran dengan bumbu kacang.', 'bahan' => 'Sayuran, bumbu kacang', 'gambar' => 'karedok.jpg', 'kalori' => 150],
            ['nama_makanan' => 'Rendang', 'resep' => 'Masak daging dengan bumbu rendang hingga empuk.', 'bahan' => 'Daging sapi, bumbu rendang', 'gambar' => 'rendang.jpg', 'kalori' => 450],
            ['nama_makanan' => 'Pecel Lele', 'resep' => 'Goreng lele, sajikan dengan sambal pecel.', 'bahan' => 'Lele, sambal pecel', 'gambar' => 'pecel_lele.jpg', 'kalori' => 300],
            ['nama_makanan' => 'Tempe Mendoan', 'resep' => 'Goreng tempe yang sudah dibalut tepung.', 'bahan' => 'Tempe, tepung', 'gambar' => 'tempe_mendoan.jpg', 'kalori' => 250],
            ['nama_makanan' => 'Coto Makassar', 'resep' => 'Rebus daging dengan bumbu coto.', 'bahan' => 'Daging sapi, bumbu coto', 'gambar' => 'coto_makassar.jpg', 'kalori' => 400],
            ['nama_makanan' => 'Kerak Telor', 'resep' => 'Campurkan ketan dengan telur, masak di atas wajan.', 'bahan' => 'Ketan, telur', 'gambar' => 'kerak_telur.jpg', 'kalori' => 350],
            ['nama_makanan' => 'Sop Kambing', 'resep' => 'Rebus kambing dengan rempah-rempah.', 'bahan' => 'Kambing, rempah-rempah', 'gambar' => 'sop_kambing.jpg', 'kalori' => 400],
            ['nama_makanan' => 'Bakso', 'resep' => 'Buat bakso dari daging, masak dalam kuah.', 'bahan' => 'Daging, tepung', 'gambar' => 'bakso.jpg', 'kalori' => 300],
            ['nama_makanan' => 'Tahu Tempe', 'resep' => 'Goreng tahu dan tempe.', 'bahan' => 'Tahu, tempe', 'gambar' => 'tahu_tempe.jpg', 'kalori' => 200],
            ['nama_makanan' => 'Ayam Penyet', 'resep' => 'Goreng ayam, penyet dengan sambal.', 'bahan' => 'Ayam, sambal', 'gambar' => 'ayam_penyet.jpg', 'kalori' => 350],
            ['nama_makanan' => 'Nasi Uduk', 'resep' => 'Masak nasi dengan santan, sajikan dengan lauk-pauk.', 'bahan' => 'Nasi, santan', 'gambar' => 'nasi_uduk.jpg', 'kalori' => 400],
            ['nama_makanan' => 'Soto Betawi', 'resep' => 'Rebus daging dengan santan dan bumbu soto.', 'bahan' => 'Daging sapi, santan, bumbu soto', 'gambar' => 'soto_betawi.jpg', 'kalori' => 400],
            ['nama_makanan' => 'Tahu Gejrot', 'resep' => 'Goreng tahu, siram dengan saus gejrot.', 'bahan' => 'Tahu, saus gejrot', 'gambar' => 'tahu_gejrot.jpg', 'kalori' => 200],
            ['nama_makanan' => 'Kwetiau Goreng', 'resep' => 'Tumis kwetiau dengan sayuran dan bumbu.', 'bahan' => 'Kwetiau, sayuran, bumbu', 'gambar' => 'kwetiau_goreng.jpg', 'kalori' => 350],
            ['nama_makanan' => 'Nasi Kuning', 'resep' => 'Masak nasi dengan kunyit dan rempah-rempah.', 'bahan' => 'Nasi, kunyit', 'gambar' => 'nasi_kuning.jpg', 'kalori' => 300],
            ['nama_makanan' => 'Kepiting Saus Padang', 'resep' => 'Masak kepiting dengan saus Padang.', 'bahan' => 'Kepiting, saus Padang', 'gambar' => 'kepiting_saus_padang.jpg', 'kalori' => 500],
            ['nama_makanan' => 'Martabak', 'resep' => 'Buat adonan martabak, goreng hingga matang.', 'bahan' => 'Tepung, telur, daging', 'gambar' => 'martabak.jpg', 'kalori' => 400],
            ['nama_makanan' => 'Es Cendol', 'resep' => 'Campurkan cendol dengan santan dan gula merah.', 'bahan' => 'Cendol, santan, gula merah', 'gambar' => 'es_cendol.jpg', 'kalori' => 200],
        ];

        foreach ($makanan as $item) {
            DB::table('makanan')->insert($item);
        }
    }
}
