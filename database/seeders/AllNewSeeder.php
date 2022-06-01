<?php

namespace Database\Seeders;

use App\Models\Address;
use Carbon\Carbon;
use App\Models\User;
use Illuminate\Database\Seeder;

class AllNewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create(
            [
                'name'                  => 'Abdan 1',
                'username'              => 'abdan1',
                'jenis_kelamin'         => '0',
                'tanggal_lahir'         => '2000-03-25',
                'no_hp'                 => '+628971613196',
                'id_privilege'          => 1,
                'id_status_pengguna'    => 1,
                'password'              => bcrypt('Abdan123'),
                'created_at'            => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at'            => Carbon::now()->format('Y-m-d H:i:s'),
            ],
        );

        User::create(
            [
                'name'                  => 'Abdan 2',
                'username'              => 'abdan2',
                'jenis_kelamin'         => '0',
                'tanggal_lahir'         => '2000-03-25',
                'no_hp'                 => '+628971613195',
                'id_privilege'          => 1,
                'id_status_pengguna'    => 1,
                'password'              => bcrypt('Abdan123'),
                'created_at'            => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at'            => Carbon::now()->format('Y-m-d H:i:s'),
            ],
        );

        Address::create([
            'id_users' => 3,
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
            'id_users' => 4,
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
