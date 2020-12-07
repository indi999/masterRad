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
            // task id = 3
            [
                'task_id' => 3,
                'department_id' => 1,
                'is_active' => true,
                'status' => true,
            ],
            [
                'task_id' => 3,
                'department_id' => 2,
                'is_active' => false,
                'status' => true,
            ],
            [
                'task_id' => 3,
                'department_id' => 3,
                'is_active' => true,
                'status' => true,
            ],
            [
                'task_id' => 3,
                'department_id' => 4,
                'is_active' => false,
                'status' => true,
            ],

            // task id = 4
            [
                'task_id' => 4,
                'department_id' => 1,
                'is_active' => true,
                'status' => true,
            ],
            [
                'task_id' => 4,
                'department_id' => 2,
                'is_active' => false,
                'status' => true,
            ],
            [
                'task_id' => 4,
                'department_id' => 3,
                'is_active' => false,
                'status' => true,
            ],
            [
                'task_id' => 4,
                'department_id' => 4,
                'is_active' => true,
                'status' => true,
            ],

            // task id = 5
            [
                'task_id' => 5,
                'department_id' => 1,
                'is_active' => false,
                'status' => true,
            ],
            [
                'task_id' => 5,
                'department_id' => 2,
                'is_active' => false,
                'status' => true,
            ],
            [
                'task_id' => 5,
                'department_id' => 3,
                'is_active' => false,
                'status' => true,
            ],
            [
                'task_id' => 5,
                'department_id' => 4,
                'is_active' => true,
                'status' => true,
            ],


            //finish tasks
            // task id = 1
            [
                'task_id' => 1,
                'department_id' => 1,
                'is_active' => true,
                'status' => true,
            ],
            [
                'task_id' => 1,
                'department_id' => 2,
                'is_active' => false,
                'status' => true,
            ],
            [
                'task_id' => 1,
                'department_id' => 3,
                'is_active' => true,
                'status' => true,
            ],
            [
                'task_id' => 1,
                'department_id' => 4,
                'is_active' => false,
                'status' => true,
            ],

            // task id = 2
            [
                'task_id' => 2,
                'department_id' => 1,
                'is_active' => true,
                'status' => true,
            ],
            [
                'task_id' => 2,
                'department_id' => 2,
                'is_active' => false,
                'status' => true,
            ],
            [
                'task_id' => 2,
                'department_id' => 3,
                'is_active' => false,
                'status' => true,
            ],
            [
                'task_id' => 2,
                'department_id' => 4,
                'is_active' => true,
                'status' => true,
            ],



        ];

        foreach ($departmentTask as $key => $value) {
            DepartmentTask::create($value);
        }
    }
}
