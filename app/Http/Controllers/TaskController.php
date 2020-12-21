<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Carbon\Carbon;

use App\Models\Task;
use App\Models\DepartmentTask;

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

    public function monitor()
    {
        if($user->role == 'monitor'){
            // if monitor
            $tasks = Task::where('finish', false)->get();
            dd($tasks);
            return view('tasks.monitor', compact('tasks'));
        }
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
    public function store()
    {
        if( Auth::user()->rola = 'manager' )  {
            $attributes = request()->validate( [
                'number' => ['required', 'integer', 'unique:tasks'],
                'brand' => ['required', 'string', 'max:50'],
                'client' => ['required', 'string', 'max:50'],
                'sale' => ['required', 'string', 'max:255'],
                'desc' => ['required', 'string', 'max:1000'],
                'date_end' => ['required', 'string', 'max:1000'],
                //'time_end' => ['required', 'string', 'max:1000'],
            ]);
            $attributes['user_id'] = auth()->user()->id;
            $attributes['expected_date_end'] =  $attributes['date_end'];
            //$attributes['expected_time_end'] =  $attributes['date_end'];

            //dd($attributes,request()->sectorItems);
            $task = Task::create($attributes);
            DepartmentTask::addDepartments(request()->sectorItems,$task->id);

            if($task){
                $sectorItems = request()->sectorItems;
                // $user = User::where('id',$attributes['user_id'])->first();

                // $name = "No: ".$attributes['number']." Manager:". $user->firstname. " ".$user->lastname;
                // $title = "Novi Task br ". $attributes['number'];
                // $message = "Message for new user"." ". " with ";
                // $this->send($name, $attributes['email'], $title, $message);

                return redirect()->route('home')->with('message', 'Novi Posao je kreiran!');
            }
            return back()->with('message', 'Novi posao nije moguce kreirati');
        }
        return back()->with('message', 'Nemate permisije za izabranu operaciju');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function show(Task $task)
    {
        if( Auth::user()->role == 'manager' ) {
            return view('tasks.show', compact('task'));
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function edit(Task $task)
    {
        if( Auth::user()->role == 'manager' ) {
            return view('tasks.edit', compact('task'));
        }
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
        if( Auth::user()->role == 'manager' ) {
            request()->validate(['expected_date_end' => 'required', 'string', 'max:1000']);
            if (request()->expected_date_end) {
                $attributes['expected_date_end'] = request()->expected_date_end;
                // pivot table
                DepartmentTask::where('task_id',$task->id)->update(['is_late' => false]);
             }
            //dd($attributes,request()->expected_date_end,request()->all(),$departmentTask );
            $task->update($attributes);
            return back()->with('message','Expected date je promenjen.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function destroy(Task $task)
    {
        if( Auth::user()->role == 'manager' ) {
            DepartmentTask::where('task_id',$task->id)->delete();
            $result = $task->delete();
            if($result){
                return back()->with('message', 'The Job has been deleted.');
            }
            return back()->with('warnings', 'Can not Job delete.');
        }
    }


    // Checkbox pivot DepartmentTask
    public function isLate(DepartmentTask $departmentTask)
    {
        $departmentTask->update([
            'is_late' => request()->has('is_late'),
            'is_finish' => false
        ]);
        return back();
    }

    public function isFinish(DepartmentTask $departmentTask)
    {
        //dd('yes12', $book);
        $departmentTask->update([
            'is_finish' => request()->has('is_finish'),
            'is_late' => false
        ]);
        return back();
    }

    public function finishJob(Task $task)
    {
        if( Auth::user()->role == 'manager' ) {
            $result = $task->update(['finish' => request()->has('finish')]);
            if ($result) {
                //DepartmentTask::where('task_id',$task->id)->update(['is_late' => false]);
                //DepartmentTask::where('task_id',$task->id)->update(['is_finish' => true]);
                return back()->with('message', 'Task is Finish.');
            }
            return back()->with('message', 'The Task status  cannot be changed.');

        }
    }
}
