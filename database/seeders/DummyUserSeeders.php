<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class DummyUserSeeders extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userData = [
            [
                'name' => 'Admin 1',
                'email' => 'admin1@insura.com',
                'role' => 'admin',
                'password' => bcrypt('123456'),
            ],

            [
                'name' => 'Admin 2',
                'email' => 'admin2@insura.com',
                'role' => 'admin',
                'password' => bcrypt('123456'),
            ],

            [
                'name' => 'User 1',
                'email' => 'user1@insura.com',
                'password' => bcrypt('123456'),
            ],

            [
                'name' => 'User 2',
                'email' => 'user2@insura.com',
                'password' => bcrypt('123456'),
            ],
        ];

        foreach ($userData as $key => $val){
            User::create($val);
        }
    }
}
