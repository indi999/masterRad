<?php

namespace Database\Seeders;

use CreateMailboxesSeeder;
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
        $this->call(TaskSeeder::class);
        $this->call(UsersSeeder::class);
        $this->call(DeparmentSeeder::class);
    }
}
