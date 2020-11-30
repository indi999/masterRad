<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Deparment;

class CreateDeparmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $deparment = [
            [
                'name'=>'Produkcija',
            ],
            [
                'name'=>'Dizajn',

            ],
            [
                'name'=>'Development',
            ],
        ];

        foreach ($deparment as $key => $value) {
            Deparment::create($value);
        }
    }
}
