<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\MasterPrivilege;
use App\Models\MasterStatusUser;
use App\Models\MasterBusinessCategory;
use Carbon\Carbon;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        MasterBusinessCategory::create(
            [
                'nama_kategori_usaha'       => 'Distro Baju',
                'status_kategori_usaha'     => 'Barang',
                'created_at'                => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at'                => Carbon::now()->format('Y-m-d H:i:s'),
            ],
        );

        MasterBusinessCategory::create(
            [
                'nama_kategori_usaha'       => 'Software House',
                'status_kategori_usaha'     => 'Jasa',
                'created_at'                => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at'                => Carbon::now()->format('Y-m-d H:i:s'),
            ],
        );
        
        MasterStatusUser::create(
            [
                'nama_status_pengguna'      => 'Aktif',
                'created_at'                => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at'                => Carbon::now()->format('Y-m-d H:i:s'),
            ]
        );

        MasterStatusUser::create(
            [
                'nama_status_pengguna'      => 'Tidak Aktif',
                'created_at'                => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at'                => Carbon::now()->format('Y-m-d H:i:s'),
            ],
        );
        
        MasterPrivilege::create(
            [
                'nama_hak_akses_pengguna'   => 'Super Admin',
                'created_at'                => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at'                => Carbon::now()->format('Y-m-d H:i:s'),
            ],
        );
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

        User::create(
            [
            'name'                  => 'Yoga Rizki Pratama',
            'username'              => 'yoga',
            'jenis_kelamin'         => 'Pria',
            'tanggal_lahir'         => '2000-03-25',
            'no_hp'                 => '081232121212',
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
            'name'                  => 'Super Admin',
            'username'              => 'Super Admin',
            'jenis_kelamin'         => 'Pria',
            'tanggal_lahir'         => '2000-03-25',
            'no_hp'                 => '081212121212',
            'email'                 => 'admin@gmail.com',
            'id_privilege'          => 1,
            'id_status_pengguna'    => 1,
            'password'              => bcrypt('admin1234'),
            'created_at'            => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at'            => Carbon::now()->format('Y-m-d H:i:s'),
            ],
        );

        // $this->call(UserSeeder::class);
        // $this->call(PrivilegeSeeder::class);
    }
}
