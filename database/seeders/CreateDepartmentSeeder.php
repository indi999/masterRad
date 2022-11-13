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
                'created_by' => 1,
                'modified_by' => 1,
            ],
            [
                'name'=>'PRODUKCIJA',
                'created_by' => 1,
                'modified_by' => 1,
            ],
            [
                'name'=>'DORADA',
                'created_by' => 1,
                'modified_by' => 1,
            ],
            [
                'name'=>'ISPORUKA',
                'created_by' => 1,
                'modified_by' => 1,
            ],

        ];

        foreach ($department as $key => $value) {
            Department::create($value);
        }
    }
}
