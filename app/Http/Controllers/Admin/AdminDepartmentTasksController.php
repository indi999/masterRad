<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use DB;

use App\Models\Task;
use App\Models\User;
use App\Models\DepartmentTask;

class AdminDepartmentTasksController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    // Checkbox pivot DepartmentTask
    public function inProgress(DepartmentTask $departmentTask)
    {
        //dd($departmentTask);
        if( Auth::user()->is_admin ) {
            $result = $departmentTask->update([
                'in_progress' => request()->has('in_progress'),
                'is_finish' => false,
                'is_late' => false,
                'modified_by' => auth()->user()->id,
            ]);
            if ($result) {
                return back()->with('message', 'Task status changed.');
            }
            return back()->with('message', 'The Task status cannot be changed.');
        }
        return back()->with('message', 'Nemate Admin permisije za izabranu operaciju');
    }

    public function isLate(DepartmentTask $departmentTask)
    {
        if( Auth::user()->is_admin ) {
            $result = $departmentTask->update([
                'is_late' => request()->has('is_late'),
                'in_progress' => false,
                'is_finish' => false,
                'modified_by' => auth()->user()->id,
            ]);
            if ($result) {
                return back()->with('message', 'Task status changed.');
            }
            return back()->with('message', 'The Task status cannot be changed.');
        }
        return back()->with('message', 'Nemate Admin permisije za izabranu operaciju');
    }

    public function isFinish(DepartmentTask $departmentTask)
    {
        if( Auth::user()->is_admin ) {
            $result = $departmentTask->update([
                'is_finish' => request()->has('is_finish'),
                'in_progress' => false,
                'is_late' => false,
                'modified_by' => auth()->user()->id,
            ]);
            if ($result) {
                return back()->with('message', 'Task status changed.');
            }
            return back()->with('message', 'The Task status cannot be changed.');
        }
        return back()->with('message', 'Nemate Admin permisije za izabranu operaciju');
    }

}
