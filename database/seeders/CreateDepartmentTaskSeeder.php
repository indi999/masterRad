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
                'is_late' => false,
                'is_finish' => true,
            ],
            [
                'task_id' => 3,
                'department_id' => 2,
                'is_active' => false,
                'is_late' => false,
                'is_finish' => false,
            ],
            [
                'task_id' => 3,
                'department_id' => 3,
                'is_active' => true,
                'is_late' => false,
                'is_finish' => false,
            ],
            [
                'task_id' => 3,
                'department_id' => 4,
                'is_active' => false,
                'is_late' => false,
                'is_finish' => false,
            ],

            // task id = 4
            [
                'task_id' => 4,
                'department_id' => 1,
                'is_active' => true,
                'is_late' => false,
                'is_finish' => false,
            ],
            [
                'task_id' => 4,
                'department_id' => 2,
                'is_active' => false,
                'is_late' => false,
                'is_finish' => false,
            ],
            [
                'task_id' => 4,
                'department_id' => 3,
                'is_active' => false,
                'is_late' => false,
                'is_finish' => false,
            ],
            [
                'task_id' => 4,
                'department_id' => 4,
                'is_active' => true,
                'is_late' => false,
                'is_finish' => true,
            ],

            // task id = 5
            [
                'task_id' => 5,
                'department_id' => 1,
                'is_active' => false,
                'is_late' => false,
                'is_finish' => false,
            ],
            [
                'task_id' => 5,
                'department_id' => 2,
                'is_active' => false,
                'is_late' => false,
                'is_finish' => false,
            ],
            [
                'task_id' => 5,
                'department_id' => 3,
                'is_active' => false,
                'is_late' => false,
                'is_finish' => false,
            ],
            [
                'task_id' => 5,
                'department_id' => 4,
                'is_active' => true,
                'is_late' => false,
                'is_finish' => false,
            ],


            //finish tasks
            // task id = 1
            [
                'task_id' => 1,
                'department_id' => 1,
                'is_active' => true,
                'is_late' => false,
                'is_finish' => true,
            ],
            [
                'task_id' => 1,
                'department_id' => 2,
                'is_active' => false,
                'is_late' => false,
                'is_finish' => true,
            ],
            [
                'task_id' => 1,
                'department_id' => 3,
                'is_active' => true,
                'is_late' => false,
                'is_finish' => true,
            ],
            [
                'task_id' => 1,
                'department_id' => 4,
                'is_active' => false,
                'is_late' => false,
                'is_finish' => true,
            ],

            // task id = 2
            [
                'task_id' => 2,
                'department_id' => 1,
                'is_active' => true,
                'is_late' => false,
                'is_finish' => true,
            ],
            [
                'task_id' => 2,
                'department_id' => 2,
                'is_active' => false,
                'is_late' => false,
                'is_finish' => true,
            ],
            [
                'task_id' => 2,
                'department_id' => 3,
                'is_active' => false,
                'is_late' => false,
                'is_finish' => true,
            ],
            [
                'task_id' => 2,
                'department_id' => 4,
                'is_active' => true,
                'is_late' => false,
                'is_finish' => true,
            ],



        ];

        foreach ($departmentTask as $key => $value) {
            DepartmentTask::create($value);
        }
    }
}
