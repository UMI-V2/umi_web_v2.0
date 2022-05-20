<?php

namespace Database\Seeders;

use App\Models\MasterProductCategory;
use Illuminate\Database\Seeder;

class MasterCategoryProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        MasterProductCategory::create([
            'nama_kategori_produk'=> "Agrobisnis",
            'status_kategori_produk'=> "0",
        ]);
        MasterProductCategory::create([
            'nama_kategori_produk'=> "Makanan",
            'status_kategori_produk'=> "0",
        ]);
        MasterProductCategory::create([
            'nama_kategori_produk'=> "Minuman",
            'status_kategori_produk'=> "0",
        ]);
        MasterProductCategory::create([
            'nama_kategori_produk'=> "Otomotif",
            'status_kategori_produk'=> "0",
        ]);
        MasterProductCategory::create([
            'nama_kategori_produk'=> "Teknologi",
            'status_kategori_produk'=> "0",
        ]);
        MasterProductCategory::create([
            'nama_kategori_produk'=> "Craft",
            'status_kategori_produk'=> "0",
        ]);
        MasterProductCategory::create([
            'nama_kategori_produk'=> "Aksesoris",
            'status_kategori_produk'=> "0",
        ]);
        MasterProductCategory::create([
            'nama_kategori_produk'=> "Rumah tangga",
            'status_kategori_produk'=> "0",
        ]);


        MasterProductCategory::create([
            'nama_kategori_produk'=> "Konveksi",
            'status_kategori_produk'=> "1",
        ]);
        MasterProductCategory::create([
            'nama_kategori_produk'=> "Fotografi",
            'status_kategori_produk'=> "1",
        ]);
        MasterProductCategory::create([
            'nama_kategori_produk'=> "Videografi",
            'status_kategori_produk'=> "1",
        ]);
        MasterProductCategory::create([
            'nama_kategori_produk'=> "Teknologi",
            'status_kategori_produk'=> "1",
        ]);
        MasterProductCategory::create([
            'nama_kategori_produk'=> "Pendidikan",
            'status_kategori_produk'=> "1",
        ]);
        MasterProductCategory::create([
            'nama_kategori_produk'=> "Transfortasi",
            'status_kategori_produk'=> "1",
        ]);
        MasterProductCategory::create([
            'nama_kategori_produk'=> "Rumah Tangga",
            'status_kategori_produk'=> "1",
        ]);

        MasterProductCategory::create([
            'nama_kategori_produk'=> "Otomotif",
            'status_kategori_produk'=> "1",
        ]);
        MasterProductCategory::create([
            'nama_kategori_produk'=> "Penyewaan",
            'status_kategori_produk'=> "1",
        ]);

        MasterProductCategory::create([
            'nama_kategori_produk'=> "Servis",
            'status_kategori_produk'=> "1",
        ]);

        MasterProductCategory::create([
            'nama_kategori_produk'=> "Rekreasi dan Hiburan",
            'status_kategori_produk'=> "1",
        ]);
    }
}
