<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\DepartmentTask;
use Illuminate\Http\Request;
use Auth;

class TaskController extends Controller
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

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Get the currently authenticated user's
        $user = Auth::user();
        if($user->role == 'manager')  {
          // if manager
          $tasks = Task::where('finish', false)->where('user_id','=', $user->id)->get();
          return view('tasks.index', compact('tasks'));
      }
      // if employees
      //$tasks = Task::where('finish', false)->departments()->where('name','=',$user->department->name)->get();
      $tasks = Task::where('finish', false)->get();
      return view('tasks.sectorJobs', compact('tasks'));
    }

    public function arhive()
    {
        // Get the currently authenticated user's
        $user = Auth::user();
        if($user->role == 'manager')  {
            // if manager
            $tasks = Task::where('finish', true)->where('user_id','=', $user->id)->get();
            return view('tasks.index', compact('tasks'));
        }
        // if employees
        //$tasks = Task::where('finish', true)->departments()->where('name','=',$user->department->name)->get();
        $tasks = Task::where('finish', true)->get();
        return view('tasks.sectorJobs', compact('tasks'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tasks.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        dd(request()->all());
        if( Auth::user()->role == 'manager')  {

            $attributes = request()->validate( [
                'number' => ['required', 'integer', 'max:15'],
                'user_id' => ['required', 'integer', 'max:10'],
                'brand' => ['required', 'string', 'max:50'],
                'client' => ['required', 'string', 'max:50'],
                'sale' => ['required', 'string', 'max:255'],
                'desc' => ['required', 'string', 'max:1000'],
                'date_end' => ['required', 'string', 'max:1000'],
                'time_end' => ['required', 'string', 'max:1000'],
                'expected_date_end' => ['required', 'string', 'max:255'],
                'expected_time_end' => ['required', 'string', 'max:255'],
            ]);
            //dd($attributes);
            $task = Task::create($attributes);

            if($task){
                // $user = User::where('id',$attributes['user_id'])->first();

                // $name = "No: ".$attributes['number']." Manager:". $user->firstname. " ".$user->lastname;
                // $title = "Novi Task br ". $attributes['number'];
                // $message = "Message for new user"." ". " with ";
                // $this->send($name, $attributes['email'], $title, $message);

                return back()->with('message','New task is create!');
            }
            return back()->with('message', 'Task not created!');

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function show(Task $task)
    {
        return view('tasks.show', compact('task'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function edit(Task $task)
    {
        return view('tasks.edit', compact('task'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Task $task)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function destroy(Task $task)
    {
        //
    }


    // Checkbox pivot DepartmentTask
    public function isLate(DepartmentTask $departmentTask)
    {
        $departmentTask->update([
            'is_late' => request()->has('is_late')
        ]);
        return back();
    }

    public function isFinish(DepartmentTask $departmentTask)
    {
        //dd('yes12', $book);
        $departmentTask->update([
            'is_finish' => request()->has('is_finish')
        ]);
        return back();
    }
}
