<?php


use App\User;
use App\UserEmail;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
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
                'email'=>'admin@test.com',
                'firstname'=>'Admin',
                'lastname'=>'Adminovic',
                'is_admin'=>true,
                'password'=> bcrypt('secret'),

            ],
            [
                'firstname'=>'User',
                'lastname'=>'Userovic',
                'email'=>'user@test.com',
                'is_admin'=>false,
                'password'=> bcrypt('123456'),

            ],
        ];

        foreach ($user as $key => $value) {
            User::create($value);
        }
    }
}
