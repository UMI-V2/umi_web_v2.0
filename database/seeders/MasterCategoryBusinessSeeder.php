<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use App\Models\MasterBusinessCategory;

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
                'nama_kategori_usaha'       => 'Agrobisnis',
                'status_kategori_usaha'     => "0",
                'created_at'                => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at'                => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'nama_kategori_usaha'       => 'Kuliner',
                'status_kategori_usaha'     => "0",
                'created_at'                => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at'                => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'nama_kategori_usaha'       => 'Otomotif',
                'status_kategori_usaha'     => "0",
                'created_at'                => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at'                => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'nama_kategori_usaha'       => 'Fashion',
                'status_kategori_usaha'     => "0",
                'created_at'                => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at'                => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'nama_kategori_usaha'       => 'Teknologi',
                'status_kategori_usaha'     => "0",
                'created_at'                => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at'                => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'nama_kategori_usaha'       => 'Craft',
                'status_kategori_usaha'     => "0",
                'created_at'                => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at'                => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'nama_kategori_usaha'       => 'Aksesoris',
                'status_kategori_usaha'     => "0",
                'created_at'                => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at'                => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            
            

            [
                'nama_kategori_usaha'       => 'Konveksi',
                'status_kategori_usaha'     => "1",
                'created_at'                => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at'                => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'nama_kategori_usaha'       => 'Fotografi',
                'status_kategori_usaha'     => "1",
                'created_at'                => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at'                => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'nama_kategori_usaha'       => 'Videografi',
                'status_kategori_usaha'     => "1",
                'created_at'                => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at'                => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'nama_kategori_usaha'       => 'Teknologi',
                'status_kategori_usaha'     => "1",
                'created_at'                => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at'                => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'nama_kategori_usaha'       => 'Pendidikan',
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
                'nama_kategori_usaha'       => 'Rumah Tangga',
                'status_kategori_usaha'     => "1",
                'created_at'                => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at'                => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'nama_kategori_usaha'       => 'Otomotif',
                'status_kategori_usaha'     => "1",
                'created_at'                => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at'                => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'nama_kategori_usaha'       => 'Penyewaan',
                'status_kategori_usaha'     => "1",
                'created_at'                => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at'                => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'nama_kategori_usaha'       => 'Servis',
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
