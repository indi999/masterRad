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
                'email'=>'admin@fps.rs',
                'firstname'=>'Admin',
                'lastname'=>'Adminovic',
                'is_admin'=>true,
                'password'=> bcrypt('secret'),
                'role'=>'admin',

            ],
            [
                'department_id'=>0,
                'firstname'=>'Manager1 ',
                'lastname'=>'Managerovic',
                'email'=>'manager@fps.rs',
                'is_admin'=>false,
                'password'=> bcrypt('123456'),
                'role'=>'manager',

            ],
            [
                'department_id'=>0,
                'firstname'=>'Manager2',
                'lastname'=>'Managerov',
                'email'=>'manager2@fps.rs',
                'is_admin'=>false,
                'password'=> bcrypt('123456'),
                'role'=>'manager',

            ],
            [
                'department_id'=>1,
                'firstname'=>'User1',
                'lastname'=>'Userovic1',
                'email'=>'priprema@fps.rs',
                'is_admin'=>false,
                'password'=> bcrypt('123456'),
                'role'=>'user',

            ],
            [
                'department_id'=>2,
                'firstname'=>'User2',
                'lastname'=>'Userovic2',
                'email'=>'produkcija@fps.rs',
                'is_admin'=>false,
                'password'=> bcrypt('123456'),
                'role'=>'user',

            ],
            [
                'department_id'=>3,
                'firstname'=>'User3',
                'lastname'=>'Userovic3',
                'email'=>'dorada@fps.rs',
                'is_admin'=>false,
                'password'=> bcrypt('123456'),
                'role'=>'user',

            ],
            [
                'department_id'=>4,
                'firstname'=>'User4',
                'lastname'=>'Userovic4',
                'email'=>'isporuka@fps.rs',
                'is_admin'=>false,
                'password'=> bcrypt('123456'),
                'role'=>'user',

            ],

            [
                'department_id'=>1,
                'firstname'=>'User5',
                'lastname'=>'Userovic5',
                'email'=>'priprema2@fps.rs',
                'is_admin'=>false,
                'password'=> bcrypt('123456'),
                'role'=>'user',

            ],

            [
                'department_id'=>0,
                'email'=>'monitor@fps.rs',
                'firstname'=>'nema',
                'lastname'=>'Nema',
                'is_admin'=>false,
                'password'=> bcrypt('123456'),
                'role'=>'monitor',

            ],

            [
                'department_id'=>0,
                'email'=>'prodavac@fps.rs',
                'firstname'=>'Prodaja',
                'lastname'=>'Prodajic',
                'is_admin'=>false,
                'password'=> bcrypt('123456'),
                'role'=>'prodavac',

            ],
            [
                'department_id'=>0,
                'email'=>'prodavac2@fps.rs',
                'firstname'=>'Prodaja2',
                'lastname'=>'Prodajic2',
                'is_admin'=>false,
                'password'=> bcrypt('123456'),
                'role'=>'prodavac',

            ],
        ];

        foreach ($user as $key => $value) {
            User::create($value);
        }
    }
}
