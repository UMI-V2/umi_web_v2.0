<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\MasterPrivilege;
use App\Models\MasterStatusUser;
use App\Models\User;
use App\Models\Address;
use Carbon\Carbon;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        MasterPrivilege::create(
            [
                'nama_hak_akses_pengguna'   => 'Admin',
                'created_at'                => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at'                => Carbon::now()->format('Y-m-d H:i:s'),
            ],
        );
        
        MasterPrivilege::create(
            [
                'nama_hak_akses_pengguna'   => 'Dinas UKM',
                'created_at'                => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at'                => Carbon::now()->format('Y-m-d H:i:s'),
            ],
        );
        
        MasterPrivilege::create(
            [
                'nama_hak_akses_pengguna'   => 'Pembeli',
                'created_at'                => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at'                => Carbon::now()->format('Y-m-d H:i:s'),
            ],
        );
        
        MasterPrivilege::create(
            [
                'nama_hak_akses_pengguna'   => 'Pembeli & Penjual',
                'created_at'                => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at'                => Carbon::now()->format('Y-m-d H:i:s'),
            ],
        );

        MasterStatusUser::create(
            [
                'nama_status_pengguna'      => 'Aktif',
                'created_at'                => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at'                => Carbon::now()->format('Y-m-d H:i:s'),
            ],
        );
        
        MasterStatusUser::create(
            [
                'nama_status_pengguna'      => 'Tidak Aktif',
                'created_at'                => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at'                => Carbon::now()->format('Y-m-d H:i:s'),
            ],
        );

        User::create(
            [
                'name'                  => 'Yoga Rizki Pratama',
                'username'              => 'yorizpra',
                'jenis_kelamin'         => 'L',
                'tanggal_lahir'         => '2000-03-25',
                'no_hp'                 => '+628971613196',
                'email'                 => 'yoga@gmail.com',
                'id_privilege'          => 1,
                'id_status_pengguna'    => 1,
                'password'              => bcrypt('yoga1234'),
                'created_at'            => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at'            => Carbon::now()->format('Y-m-d H:i:s'),
            ],
        );

        User::create(
            [
                'name'                  => 'Abdan 2',
                'username'              => 'abdan2',
                'jenis_kelamin'         => 'L',
                'tanggal_lahir'         => '2000-03-25',
                'no_hp'                 => '+628971613195',
                'email'                 => 'dadan@gmail.com',
                'id_privilege'          => 1,
                'id_status_pengguna'    => 1,
                'password'              => bcrypt('Abdan123'),
                'created_at'            => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at'            => Carbon::now()->format('Y-m-d H:i:s'),
            ],
        );

        Address::create([
            'id_users' => 1,
            'province_id' => 9,
            'city_id' => 149,
            'subdistrict_id' => 2070,
            'nama' => "Dadan",
            'no_hp' => "08971613199",
            'alamat_lengkap' => 'Jl. Karang Malang, No.8, Desa Lohbener, Kecamatan Lohbener, Kabupaten Indramayu',
            'patokan' => "Kos Bunda Zifa",
            'is_alamat_utama' => 1,
            'is_rumah' => 1,
            'is_kantor' => 0,
            'is_usaha' => 1,
            'latitude' => -6.406576,
            'longitude' => 108.282833,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        Address::create([
            'id_users' => 2,
            'province_id' => 9,
            'city_id' => 149,
            'subdistrict_id' => 2070,
            'nama' => "Dadan",
            'no_hp' => "08971613199",
            'alamat_lengkap' => 'Jl. Karang Malang, No.8, Desa Bangkir, Kecamatan  , Kabupaten Indramayu',
            'patokan' => "Pasar Bangkir",
            'is_alamat_utama' => 1,
            'is_rumah' => 1,
            'is_kantor' => 0,
            'is_usaha' => 1,
            'latitude' => -6.396229,
            'longitude' => 108.284638,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
    }
}
