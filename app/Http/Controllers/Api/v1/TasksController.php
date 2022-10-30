<?php

namespace App\Http\Controllers\Api\V1;

use Auth;
use Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Task;
use App\Models\User;
use App\Models\DepartmentTask;
use App\Http\Resources\Task as TaskResource;

class TasksController extends Controller
{
    public function index()
    {
        return response()->json(Task::paginate(5), 200);
    }

    public function show($id)
    {
        $task = Task::with('questions')->findOrFail($id);
        $response['Task'] = $task;
        $response = new TaskResource($response, 200);
        return response()->json($response, 200);

    }

    public function store(Request $request)
    {
        //Validator
        $rules = [
            'number' => 'required|integer|digits_between:1,10|unique:tasks',
            'user_id' => 'required|integer',
            'brand' => 'required|string|max:50',
            'client' => 'required|string|max:50',
            'saller_id' => 'required|integer',
            'desc' => 'required|string|max:1000',
            'date_end' => 'required|string',
        ];
        $attributes = request()->all();
        $validator = Validator::make($attributes, $rules);
        if($validator->fails()){
            return response($validator->errors(), 400);
        }

        //Create task
        $attributes['expected_date_end'] = $attributes['date_end'];
        $task = Task::create($attributes);
        if ($task) {
            DepartmentTask::addDepartments(request()->sectorItems, $task->id);
            return response()->json($task, 201);
        }
        return response()->json(null, 400);
    }

    public function update(Request $request, Task $task)
    {
        $attributes = request()->all();
        $attributes['expected_date_end'] = $attributes['date_end'];
        $task->update( $attributes );

        return response()->json($task, 200);
    }

    public function delete(Request $request, Task $task)
    {
        $task->delete();
        return response()->json(null, 204);
    }
}
