<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    // php artisan db:seed
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call(CreateDepartmentSeeder::class);
        $this->call(CreateUserSeeder::class);
        $this->call(CreateTaskSeeder::class);
        $this->call(CreateDepartmentTaskSeeder::class);
    }
}
