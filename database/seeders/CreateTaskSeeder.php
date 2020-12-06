<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Task;


class CreateTaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();
        $tasks = [
            [
                'number' => 123456,
                'brand' => 'Beneton d.o.o.',
                'client' => 'Beneton',
                'sale' => "sale",
                'desc' => $faker->text($maxNbChars = 300),
                'date_end' => $faker->date,
                'time_end' => $faker->time,
                'expected_date_end' => $faker->date,
                'expected_time_end' => $faker->time,
                'finish' => true,
            ],
            [
                'number' => 3726485,
                'brand' => 'Sauter d.o.o.',
                'client' => 'Sauter',
                'sale' => "sale",
                'desc' => $faker->text($maxNbChars = 300),
                'date_end' => $faker->date,
                'time_end' => $faker->time,
                'expected_date_end' => $faker->date,
                'expected_time_end' => $faker->time,
                'finish' => true,

            ],
            [
                'number' => 9483723,
                'brand' => 'BIZUP d.o.o.',
                'client' => 'BizUp',
                'sale' => "sale",
                'desc' => $faker->text($maxNbChars = 300),
                'date_end' => $faker->date,
                'time_end' => $faker->time,
                'expected_date_end' => $faker->date,
                'expected_time_end' => $faker->time,
                'finish' => false,
            ],

            [
                'number' => 6463738,
                'brand' => 'Avtera d.o.o.',
                'client' => 'Avtera',
                'sale' => "sale",
                'desc' => $faker->text($maxNbChars = 300),
                'date_end' => $faker->date,
                'time_end' => $faker->time,
                'expected_date_end' => $faker->date,
                'expected_time_end' => $faker->time,
                'finish' => false,
            ],

            [
                'number' => 447866558,
                'brand' => 'Eurotay d.o.o.',
                'client' => 'Eurotay',
                'sale' => "sale",
                'desc' => $faker->text($maxNbChars = 300),
                'date_end' => $faker->date,
                'time_end' => $faker->time,
                'expected_date_end' => $faker->date,
                'expected_time_end' => $faker->time,
                'finish' => false,
            ],
        ];

        foreach ($tasks as $key => $value) {
            Task::create($value);
        }


    }
}
