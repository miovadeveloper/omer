<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        $users = [[
            'id'             => 1,
            'name'           => 'Admin',
            'email'          => 'admin@admin.com',
            'password'       => '$2y$10$qj1/TFz2WC5GAg1iWkmI9OZvYfWOrd4wAVo.6iU8s13E5HK697SgG',
            'remember_token' => null,
            'created_at'     => '2019-06-06 21:33:06',
            'updated_at'     => '2019-06-06 21:33:06',
            'deleted_at'     => null,
        ]];

        User::insert($users);
    }
}
