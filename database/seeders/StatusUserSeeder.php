<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\MasterStatusUser;
use Carbon\Carbon;

class StatusUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $status_user = [
            [
                'nama_status_pengguna'      => 'Aktif',
                'created_at'                => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at'                => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'nama_status_pengguna'      => 'Tidak Aktif',
                'created_at'                => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at'                => Carbon::now()->format('Y-m-d H:i:s'),
            ],
        ];
        MasterStatusUser::insert($status_user);
    }
}
