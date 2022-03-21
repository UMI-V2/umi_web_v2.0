<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\MasterPrivilege;
use Carbon\Carbon;

class PrivilegeSeeder extends Seeder
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
                'nama_hak_akses_pengguna'   => 'Super Admin',
                'created_at'                => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at'                => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'nama_hak_akses_pengguna'   => 'Admin',
                'created_at'                => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at'                => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'nama_hak_akses_pengguna'   => 'Pembeli',
                'created_at'                => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at'                => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'nama_hak_akses_pengguna'   => 'Pembeli & Penjual',
                'created_at'                => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at'                => Carbon::now()->format('Y-m-d H:i:s'),
            ],
        ];
        MasterPrivilege::insert($privileges);
    }
}
