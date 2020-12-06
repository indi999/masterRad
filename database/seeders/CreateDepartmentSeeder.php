<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Department;

class CreateDepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $department = [
            [
                'name'=>'DIZAJN/PRIPREMA',
            ],
            [
                'name'=>'PRODUKCIJA',

            ],
            [
                'name'=>'DORADA',
            ],
            [
                'name'=>'ISPORUKA',
            ],
        ];

        foreach ($department as $key => $value) {
            Department::create($value);
        }
    }
}
