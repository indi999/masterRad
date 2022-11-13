<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Carbon\Carbon;

use App\Models\Task;
use App\Models\DepartmentTask;
use App\Models\User;

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
     * Display a listing of the Tasks.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Get the currently authenticated user's
        $user = auth()->user();
        if($user->role == 'manager')  {
          // if manager
          $tasks = Task::where('finish', false)->where('user_id','=', $user->id)->get();
          return view('tasks.index', compact('tasks'));

        }elseif($user->role == 'prodavac'){  // if sallers
            $tasks = Task::where('finish', false)->where('user_id','=', $user->id)->get();
            return view('tasks.index', compact('tasks'));
        }
      // if employees
      $tasks = Task::where('finish', false)->get();
      return view('tasks.sectorJobs', compact('tasks'));
    }

    /**
     * Display a Arhive listing of the Tasks.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function arhive()
    {
        // Get the currently authenticated user's
        $user = auth()->user();
        if($user->role == 'manager')  {
            // if manager
            $tasks = Task::where('finish', true)->where('user_id','=', $user->id)->get();
            return view('tasks.index', compact('tasks'));

        }elseif($user->role == 'prodavac'){  // if sallers
            $tasks = Task::where('finish', true)->where('user_id','=', $user->id)->get();
            return view('tasks.index', compact('tasks'));
        }
        // if employees
        $tasks = Task::where('finish', true)->get();
        return view('tasks.sectorJobs', compact('tasks'));
    }

    public function monitor()
    {
        if(auth()->user()->role == 'monitor'){  //auth()->user()->role
            // if monitor
            $tasks = Task::where('finish', false)->get();
            return view('tasks.monitor', compact('tasks'));
        }
    }

    /**
     * creating a new task.
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
        if(auth()->user()->role = 'manager') {
            $attributes = request()->validate( [
                'number' => ['required', 'integer', 'unique:tasks'],
                'brand' => ['required', 'string', 'max:50'],
                'client' => ['required', 'string', 'max:50'],
                'saller_id' => ['required', 'integer'],
                'desc' => ['required', 'string', 'max:1000'],
                'date_end' => ['required', 'string', 'max:50'],
            ]);
            //$attributes['number'] = 123456; // need algoritam!
            $attributes['user_id'] = auth()->user()->id;
            $attributes['expected_date_end'] =  $attributes['date_end'];
            $attributes['created_by'] = auth()->user()->id;
            $attributes['modified_by'] = auth()->user()->id;
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
        if(auth()->user()) {
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
        if(auth()->user()->role == 'manager') {
            $attributes=[];
            $saller = User::find($task->saller_id);
            $attributes['sallerData'] = ['sellerID' => $saller->id , 'fullName' => $saller->firstname.' '.$saller->lastname ];

            return view('tasks.edit', compact('task','attributes'));
        }
        return back()->with('message', 'Nemate permisije za izabranu operaciju');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function update(Task $task)
    {
        if( Auth::user()->role == 'manager' ) {

            $attributes = [];
            if (request()->number) {
                request()->validate(['number' => 'required|string|max:1000']);
                $attributes['number'] = request()->number;
            }

            if (request()->user_id) {
                request()->validate(['user_id' => 'required|integer']);
                $attributes['user_id'] = request()->user_id;
            }

            if (request()->brand) {
                request()->validate(['brand' => 'required|string|max:50']);
                $attributes['brand'] = request()->brand;
            }

            if (request()->client) {
                request()->validate(['client' => 'required|string|max:50']);
                $attributes['client'] = request()->client;
            }

            if (request()->saller_id) {
                request()->validate(['saller_id' => 'required|integer']);
                $attributes['saller_id'] = request()->saller_id;
            }

            if (request()->desc) {
                request()->validate(['desc' => 'required|string|max:10000']);
                $attributes['desc'] = request()->desc;
            }

            if (request()->date_end) {
                request()->validate(['date_end' => 'required|string|max:50']);
                $attributes['date_end'] = request()->date_end;
            }

            if (request()->expected_date_end) {
                request()->validate(['expected_date_end' => 'required', 'string', 'max:1000']);
                $attributes['expected_date_end'] = request()->expected_date_end;
                // pivot table
                DepartmentTask::where('task_id',$task->id)->update(['is_late' => false]);
            }

            if($attributes != null){
                //DB::beginTransaction();
                $result = $task->update($attributes);
                if(!$result) {
                    //DB::rollBack();
                    return back()->with('message', 'Podaci nisu za navedeni poslovni nalog promenjeni!.Doslo je do greske!');
                }
                DepartmentTask::updateDepartments(request()->sectorItems, $task->id);
                //DB::commit();

                return back()->with('message', 'Podaci za navedeni poslovni nalog su promenjeni!.');
            }
            return back()->with('message', 'Nisu unete promene u poslovnom nalogu!');
        }
        return back()->with('message', 'Nemate Admin permisije za izabranu operaciju');
    }

    /**
     * Update expected_date_end the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Task  $job
     * @return \Illuminate\Http\Response
     */
    public function updateExpectedDateEnd(Task $task)
    {
        if(auth()->user()->role == 'manager') {
            if (request()->expected_date_end) {
                request()->validate(['expected_date_end' => 'required', 'string', 'max:1000']);
                $attributes['expected_date_end'] = request()->expected_date_end;
                //DepartmentTask pivot table
                DepartmentTask::where('task_id',$task->id)->update([
                    'is_late' => false,
                    'modified_by' => auth()->user()->id,
                ]);
                $task->update($attributes);
                return back()->with('message','Expected date je promenjen.');
            }
            return back()->with('message', 'Nije promenjen Expected date, pokusajte ponovo!');
        }
        return back()->with('message', 'Nemate Manager permisije za izabranu operaciju');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function finishJob(Task $task)
    {
        if(auth()->user()->role == 'manager') {
            $result = $task->update([
                'finish' => request()->has('finish'),
                'modified_by' => auth()->user()->id,
            ]);
            if ($result) {
                //DepartmentTask::where('task_id',$task->id)->update(['is_late' => false]);
                //DepartmentTask::where('task_id',$task->id)->update(['is_finish' => true]);
                return back()->with('message', 'Task is Finish.');
            }
            return back()->with('message', 'The Task status  cannot be changed.');
        }
        return back()->with('message', 'Nemate permisije za izabranu operaciju');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function destroy(Task $task)
    {
        if(auth()->user()->role == 'manager') {

            DepartmentTask::where('task_id', $task->id)->delete();
            $result = $task->delete();
            if($result){
                return back()->with('message', 'The Job has been deleted.');
            }
            return back()->with('warnings', 'Can not Job delete.');
        }
        return back()->with('message', 'Nemate permisije za izabranu operaciju');
    }

    // Checkbox pivot DepartmentTask ---------------------------------------------------------------------
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function inProgress(Task $task)
    {
        if(auth()->user()) {
            $result = $task->update([
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
        return back()->with('message', 'Nemate Manager permisije za izabranu operaciju');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function isLate(DepartmentTask $departmentTask)
    {
        if(auth()->user()) {
            $departmentTask->update([
                'is_late' => request()->has('is_late'),
                'in_progress' => false,
                'is_finish' => false,
                'modified_by' => auth()->user()->id,
            ]);
            return back();
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function isFinish(DepartmentTask $departmentTask)
    {
        if(auth()->user()) {
            $departmentTask->update([
                'is_finish' => request()->has('is_finish'),
                'in_progress' => false,
                'is_late' => false,
                'modified_by' => auth()->user()->id,
            ]);
            return back();
        }
    }
}
