<?php

namespace Database\Seeders;

use App\Models\DepartmentTask;
use Illuminate\Database\Seeder;

class CreateDepartmentTaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $departmentTask = [
            [
                'task_id' => 3,
                'department_id' => 1,
                'status' => true,
            ],
            [
                'task_id' => 2,
                'department_id' => 2,
                'status' => true,
            ],
            [
                'task_id' => 3,
                'department_id' => 2,
                'status' => false,
            ],
            [
                'task_id' => 4,
                'department_id' => 1,
                'status' => true,
            ],
            [
                'task_id' => 5,
                'department_id' => 3,
                'status' => true,
            ],


            // ARHIVE
            [
                'task_id' => 1,
                'department_id' => 2,
                'status' => true,
            ],

            [
                'task_id' => 2,
                'department_id' => 1,
                'status' => true,
            ],
            [
                'task_id' => 2,
                'department_id' => 2,
                'status' => true,
            ],
        ];

        foreach ($departmentTask as $key => $value) {
            DepartmentTask::create($value);
        }
    }
}
