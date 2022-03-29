<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use App\Models\MasterBusinessCategory;
use App\Models\master_business_category;

class MasterCategoryBusinessSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $privileges = [
            [
                'nama_kategori_usaha'       => 'Makanan dan Minuman',
                'status_kategori_usaha'     => "0",
                'created_at'                => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at'                => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'nama_kategori_usaha'       => 'Pakaian Wanita',
                'status_kategori_usaha'     => "0",
                'created_at'                => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at'                => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'nama_kategori_usaha'       => 'Pakaian Pria',
                'status_kategori_usaha'     => "0",
                'created_at'                => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at'                => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'nama_kategori_usaha'       => 'Perawatan dan Kecantikan',
                'status_kategori_usaha'     => "0",
                'created_at'                => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at'                => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'nama_kategori_usaha'       => 'Kesehatan',
                'status_kategori_usaha'     => "0",
                'created_at'                => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at'                => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'nama_kategori_usaha'       => 'Aksesoris Fashion',
                'status_kategori_usaha'     => "0",
                'created_at'                => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at'                => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'nama_kategori_usaha'       => 'Elektronik',
                'status_kategori_usaha'     => "0",
                'created_at'                => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at'                => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'nama_kategori_usaha'       => 'Handphone & Aksesoris',
                'status_kategori_usaha'     => "0",
                'created_at'                => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at'                => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'nama_kategori_usaha'       => 'Fashion Muslim',
                'status_kategori_usaha'     => "0",
                'created_at'                => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at'                => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'nama_kategori_usaha'       => 'Sepatu Pria',
                'status_kategori_usaha'     => "0",
                'created_at'                => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at'                => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'nama_kategori_usaha'       => 'Swpatu Wanita',
                'status_kategori_usaha'     => "0",
                'created_at'                => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at'                => Carbon::now()->format('Y-m-d H:i:s'),
            ],


            [
                'nama_kategori_usaha'       => 'Perumahan',
                'status_kategori_usaha'     => "1",
                'created_at'                => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at'                => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'nama_kategori_usaha'       => 'Komunikasi',
                'status_kategori_usaha'     => "1",
                'created_at'                => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at'                => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'nama_kategori_usaha'       => 'Usaha Rumah Tangga',
                'status_kategori_usaha'     => "1",
                'created_at'                => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at'                => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'nama_kategori_usaha'       => 'Transfortasi',
                'status_kategori_usaha'     => "1",
                'created_at'                => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at'                => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'nama_kategori_usaha'       => 'Rekreasi dan Hiburan',
                'status_kategori_usaha'     => "1",
                'created_at'                => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at'                => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            
        ];
        MasterBusinessCategory::insert($privileges);
    }
}
