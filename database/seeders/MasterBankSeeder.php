<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\MasterBank;
use Illuminate\Database\Seeder;

class MasterBankSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $banks = [
            [
                'name'                      => "Bank Permata (PERMATA)",
                'cost_admin'                => 5000,               
                'logo'                      =>"https://4.bp.blogspot.com/-7uu4rVpgPKE/XCRthrSp8rI/AAAAAAAARKA/vEz16_E_LJQXuiC-yfxuiALamDHs6ugJwCLcBGAs/s1600/Permata%2BBank.png",
                'created_at'                => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at'                => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'name'                      => "Bank Negara Indonesia (BNI)",
                'cost_admin'                => 5000,               
                'logo'                      =>"https://cdn-2.tstatic.net/tribunnewswiki/foto/bank/images/lowongan-bni.jpg",
                'created_at'                => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at'                => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'name'                      => "Bank MANDIRI (MANDIRI)",
                'cost_admin'                => 5000,               
                'logo'                      =>"https://logos-download.com/wp-content/uploads/2016/06/Mandiri_logo.png",
                'created_at'                => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at'                => Carbon::now()->format('Y-m-d H:i:s'),
            ],
        ];
        MasterBank::insert( $banks);
    }
}
