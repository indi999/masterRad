<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;


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
        'in_progress',
        'is_active',
        'is_late',
        'is_finish',
        'created_by',
        'modified_by',
    ];

    public static function addDepartments($sectorItems, $task_id)
    {
        $sectorItems = json_decode($sectorItems);
        $departments = Department::all();

        foreach($departments as $department) {
            $department_id = $department->id;
            $created_by = auth()->user()->id;
            $modified_by = auth()->user()->id;
            if (in_array((string)$department->id, $sectorItems)) {
                $is_active = true;
                static::create(compact('department_id', 'task_id', 'is_active','created_by','modified_by'));
            }else{
                $is_active = false;
                static::create(compact('department_id', 'task_id', 'is_active','created_by','modified_by'));
            }
        }
    }

    public static function updateDepartments($sectorItems, $task_id)
    {
        $departments = Department::all();  //[1,2,3,4,6]
        $sectorItems = json_decode($sectorItems); // [1,6]

        DB::beginTransaction();
            $result = DepartmentTask::where('task_id', $task_id)->delete(); //[1,2,3,4]

            if(!$result ){
                DB::rollBack();
                //return "NE VALJA";
                dd("Nije nesto u redu");
            }
            foreach($departments as $department) {
                $department_id = $department->id;
                $created_by = auth()->user()->id;
                $modified_by = auth()->user()->id;
                if (in_array((string)$department->id, $sectorItems)) {
                    $is_active = true;
                    static::create(compact('department_id', 'task_id', 'is_active','created_by','modified_by'));
                }else{
                    $is_active = false;
                    static::create(compact('department_id', 'task_id', 'is_active','created_by','modified_by'));
                }
            }
        DB::commit();
    }
}
