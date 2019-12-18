<?php

use App\AppUser;
use Illuminate\Database\Seeder;

class AppUsersTableSeeder extends Seeder
{
    public function run()
    {
        $appUser = [[
            'id'             => 1,
            'name'           => 'appUser',
            'email'          => 'user@User.com',
            'password'       => 'password',
            'remember_token' => null,
            'api_token' => null,
            'created_at'     => '2019-04-15 19:13:32',
            'updated_at'     => '2019-04-15 19:13:32',
            'deleted_at'     => null,
        ]];

        AppUser::insert($appUser);
    }
}
