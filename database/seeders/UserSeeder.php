<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
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
        $users = [
            [
                'name'           => 'Super Admin',
                'email'          => 'yoga@gmail.com',
                'password'       => bcrypt('yoga1234'),
                'created_at'     => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at'     => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            // [
            //     'name'           => 'Admin',
            //     'email'          => 'admin@dadan-project.my.id',
            //     'password'       => bcrypt('admin9090'),
            //     'uid'            => 'uid',
            // ],
            // [
            //     'name'           => 'Muhamad Abdan',
            //     'email'          => 'm.abdan.maruf01@gmail.com',
            //     'uid'            => '5AKG9LEWCOeRPmj8zm50cjSuK9k2',
            // ],
            // [
            //     'name'           => 'Abu Mushonnip',
            //     'email'          => 'mushonnipabu@gmail.com',
            //     'uid'            => 'Y7UCeh0FcsYZQAwKBwlL2CQgLbU2',
            // ],
        ];
        User::insert($users);
    }
}
