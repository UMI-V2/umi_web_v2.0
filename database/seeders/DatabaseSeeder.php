<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\MasterPrivilege;
use App\Models\MasterStatusUser;
use App\Models\MasterStatusBusiness;
use App\Models\MasterBusinessCategory;
use App\Models\MasterProvince;
use App\Models\MasterUnit;
use App\Models\MasterDeliveryService;
use App\Models\MasterPaymentMethod;

use App\Models\User;
use App\Models\Business;
use App\Models\BusinessDeliveryService;
use App\Models\Address;
use App\Models\City;
use App\Models\SubDistrict;
use App\Models\Product;

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

        MasterPaymentMethod::create(
            [
                'nama_metode_pembayaran'        => 'Transfer Bank',
                'deskripsi_metode_pembayaran'   => 'Transfer uang melalui Bank',
                'created_at'                    => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at'                    => Carbon::now()->format('Y-m-d H:i:s'),
            ],
        );

        MasterDeliveryService::create(
            [
                'nama_jasa_pengiriman'      => 'JNT',
                'is_set_seller'             => 0,
                'deskripsi'                 => 'Jasa Pengiriman dari JNT',
                'kode_rajaongkir'           => 'JNT01',
                'created_at'                => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at'                => Carbon::now()->format('Y-m-d H:i:s'),
            ],
        );

        MasterUnit::create(
            [
                'nama_satuan'               => 'Kilogram',
                'singkatan_satuan'          => 'Kg',
                'created_at'                => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at'                => Carbon::now()->format('Y-m-d H:i:s'),
            ],
        );

        MasterProvince::create(
            [
                'nama_provinsi'             => 'Jawa Barat',
                'created_at'                => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at'                => Carbon::now()->format('Y-m-d H:i:s'),
            ],
        );

        City::create(
            [
                'id_provinsi'               => 1,
                'nama_kota'                 => 'Indramayu',
                'created_at'                => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at'                => Carbon::now()->format('Y-m-d H:i:s'),
            ],
        );

        SubDistrict::create(
            [
                'id_provinsi'               => 1,
                'id_kota'                   => 1,
                'nama_kecamatan'            => 'Lohbener',
                'created_at'                => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at'                => Carbon::now()->format('Y-m-d H:i:s'),
            ],
        );

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
        
        MasterStatusBusiness::create(
            [
                'nama_status_usaha'         => 'Aktif',
                'created_at'                => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at'                => Carbon::now()->format('Y-m-d H:i:s'),
            ]
        );

        MasterStatusBusiness::create(
            [
                'nama_status_usaha'         => 'Tidak Aktif',
                'created_at'                => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at'                => Carbon::now()->format('Y-m-d H:i:s'),
            ]
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

        Business::create(
            [
            'id_user'                   => 1,
            'id_master_status_usaha'    => 1,
            'nama_usaha'                => 'Distro Baju',
            'created_at'                => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at'                => Carbon::now()->format('Y-m-d H:i:s'),
            ],
        );

        BusinessDeliveryService::create(
            [
            'id_usaha'                     => 1,
            'id_master_jasa_pengiriman'    => 1,
            'biaya'                        => 14000,
            'created_at'                   => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at'                   => Carbon::now()->format('Y-m-d H:i:s'),
            ],
        );

        Address::create(
            [
            'id_users'              => 1,
            'id_provinsi'           => 1,
            'id_kota'               => 1,
            'id_kecamatan'          => 1,
            'nama'                  => 'Yoga Rizki Pratama',
            'no_hp'                 => '081232121212',
            'alamat_lengkap'        => 'lohsalah',
            'patokan'               => 'depan gang',
            'is_alamat_utama'       => 1,
            'is_rumah'              => 1,
            'is_kantor'             => 0,
            'is_usaha'              => 0,
            'latitude'              => '123456789',
            'longitude'             => '987654321',
            'created_at'            => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at'            => Carbon::now()->format('Y-m-d H:i:s'),
            ],
        );

        Product::create(
            [
            'id_usaha'              => 1,
            'id_satuan'             => 1,
            'nama'                  => 'Baju Batik',
            'deskripsi'             => 'Produk buatan lokal biasa dipakai untuk hajatan',
            'harga'                 => '1000000',
            'stok'                  => '100',
            'kondisi'               => 1,
            'preorder'              => 1,
            'created_at'            => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at'            => Carbon::now()->format('Y-m-d H:i:s'),
            ],
        );

        // $this->call(UserSeeder::class);
        // $this->call(PrivilegeSeeder::class);
    }
}
