<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class CreateUserSeeder extends Seeder
{
    // php artisan db:seed --class=CreateUsersSeeder
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = [
            [
                'department_id'=>0,
                'email'=>'admin@test.com',
                'firstname'=>'Admin',
                'lastname'=>'Adminovic',
                'is_admin'=>true,
                'password'=> bcrypt('secret'),
                'role'=>'admin',

            ],
            [
                'department_id'=>1,
                'firstname'=>'UserManager1',
                'lastname'=>'Userovic',
                'email'=>'manager1@test.com',
                'is_admin'=>false,
                'password'=> bcrypt('123456'),
                'role'=>'manager',

            ],
            [
                'department_id'=>2,
                'firstname'=>'UserManager2',
                'lastname'=>'Userovic',
                'email'=>'manager2@test.com',
                'is_admin'=>false,
                'password'=> bcrypt('123456'),
                'role'=>'manager',

            ],
            [
                'department_id'=>1,
                'firstname'=>'User1',
                'lastname'=>'Userovic1',
                'email'=>'user1@test.com',
                'is_admin'=>false,
                'password'=> bcrypt('123456'),
                'role'=>'user',

            ],
            [
                'department_id'=>2,
                'firstname'=>'User2',
                'lastname'=>'Userovic2',
                'email'=>'user2@test.com',
                'is_admin'=>false,
                'password'=> bcrypt('123456'),
                'role'=>'user',

            ],
            [
                'department_id'=>2,
                'firstname'=>'User3',
                'lastname'=>'Userovic3',
                'email'=>'user3@test.com',
                'is_admin'=>false,
                'password'=> bcrypt('123456'),
                'role'=>'user',

            ],
            [
                'department_id'=>3,
                'firstname'=>'User4',
                'lastname'=>'Userovic4',
                'email'=>'user4@test.com',
                'is_admin'=>false,
                'password'=> bcrypt('123456'),
                'role'=>'user',

            ],

            [
                'department_id'=>2,
                'firstname'=>'User5',
                'lastname'=>'Userovic5',
                'email'=>'user5@test.com',
                'is_admin'=>false,
                'password'=> bcrypt('123456'),
                'role'=>'user',

            ],
        ];

        foreach ($user as $key => $value) {
            User::create($value);
        }
    }
}
