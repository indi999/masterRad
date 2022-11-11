<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Department;

class DepartmentTask extends Model
{
    use HasFactory;

    public $table = 'department_task';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'task_id',
        'department_id',
        'is_active',
        'is_late',
        'is_finish',
    ];

    public static function addDepartments($sectorItems, $task_id)
    {
        $sectorItems = json_decode($sectorItems);
        $departments = Department::all();

        foreach($departments as $department) {
            $department_id = $department->id;
            if (in_array((string)$department->id, $sectorItems)) {
                $is_active = true;
                static::create(compact('department_id', 'task_id', 'is_active'));
            }else{
                $is_active = false;
                static::create(compact('department_id', 'task_id', 'is_active'));
            }
        }
    }

    public static function updateDepartments($sectorItems, $task_id)
    {
        $sectorItems = json_decode($sectorItems); // [1,6]
        $departments = Department::all();  //[1,2,3,4,6]
        $selectDs = DepartmentTask::where('task_id', $task_id)->get(); //[1,2,3,4]





        foreach ($departments as $department) {
            $department_id = $department->id;
            if (in_array((string)$department->id, $sectorItems)) {
                foreach($selectDs as $selectD){
                    if (!in_array((string)$selectD->department_id, $sectorItems)) {
                        $is_active = true;
                        static::create(compact('department_id', 'task_id', 'is_active'));
                    }
                }
            }else{
                $is_active = false;
                static::create(compact('department_id', 'task_id', 'is_active'));
                //dd($department->id); //delete
            }

        }
    }
}
