<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;

use App\Models\Task;
use App\Models\User;
use App\Models\DepartmentTask;

class AdminTaskController extends Controller
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
        if( Auth::user()->is_admin )  {
            // if manager
            $tasks = Task::where('finish', false)->get();
            return view('admins.tasks.index', compact('tasks'));
        }
        return back()->with('message', 'Nemate Admin permisije za izabranu operaciju');
    }

    public function arhive()
    {
        if( Auth::user()->is_admin )  {
            $tasks = Task::where('finish', true)->get();
            return view('admins.tasks.index', compact('tasks'));
        }
        return back()->with('message', 'Nemate Admin permisije za izabranu operaciju');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if( Auth::user()->is_admin )  {
            return view('admins.tasks.create');
        }
        return back()->with('message', 'Nemate Admin permisije za izabranu operaciju');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function show(Task $job)
    {
        if( Auth::user()->is_admin ){
            return view('admins.tasks.show', compact('job'));
        }
        return back()->with('message', 'Nemate Admin permisije za izabranu operaciju');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        if( Auth::user()->is_admin) {
            $attributes = request()->validate( [
                'number' => ['required', 'integer', 'unique:tasks'],
                'user_id' => ['required', 'integer'],
                'brand' => ['required', 'string', 'max:50'],
                'client' => ['required', 'string', 'max:50'],
                'saller_id' => ['required', 'integer'],
                'desc' => ['required', 'string', 'max:1000'],
                'date_end' => ['required', 'string', 'max:50'],
                //'time_end' => ['required', 'string', 'max:50'],
            ]);
            //$attributes['date_end'] =  $attributes['date_end']." ". $attributes['time_end'];
            $attributes['expected_date_end'] =  $attributes['date_end'];
            //$attributes['expected_time_end'] =  $attributes['time_end'];

            //dd($attributes);
            $task = Task::create($attributes);
            DepartmentTask::addDepartments(request()->sectorItems,$task->id);

            if($task){
                $sectorItems = request()->sectorItems;
                // $user = User::where('id',$attributes['user_id'])->first();

                // $name = "No: ".$attributes['number']." Manager:". $user->firstname. " ".$user->lastname;
                // $title = "Novi Task br ". $attributes['number'];
                // $message = "Message for new user"." ". " with ";
                // $this->send($name, $attributes['email'], $title, $message);
                return redirect()->route('admin.dashboard')->with('message', 'Novi Posao je kreiran!');
            }
            return back()->with('message', 'Novi posao nije moguce kreirati');
        }
        return back()->with('message', 'Nemate Admin permisije za izabranu operaciju');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function edit(Task $job)
    {
        if( Auth::user()->is_admin )  {
            return view('admins.tasks.edit', compact('job'));
        }
        return back()->with('message', 'Nemate Admin permisije za izabranu operaciju');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Task $job)
    {
        if( Auth::user()->is_admin ) {

            request()->validate(['expected_date_end' => 'required', 'string', 'max:1000']);
            if (request()->expected_date_end) {
                $attributes['expected_date_end'] = request()->expected_date_end;
                // pivot table
                DepartmentTask::where('task_id',$job->id)->update(['is_late' => false]);
            }
            //dd($attributes,request()->expected_date_end,request()->all(),$departmentTask );
            $job->update($attributes);
            return back()->with('message','Expected date je promenjen.');
        }
        return back()->with('message', 'Nemate Admin permisije za izabranu operaciju');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function destroy(Task $job)
    {
        if( Auth::user()->is_admin ) {
            DepartmentTask::where('task_id',$job->id)->delete();
            $result = $job->delete();
            if($result){
                return back()->with('message', 'The Job has been deleted.');
            }
            return back()->with('warnings', 'Can not Job delete!');
        }
        return back()->with('message', 'Nemate Admin permisije za izabranu operaciju');
    }

    // Sending emails
    public function send($name, $email, $title, $message)
    {
        //dd($name, $email, $title, $message);
        $objSupport = new \stdClass();
        // Sender data
        $objSupport->senderName = $name;
        $objSupport->senderEmail = $email;
        $objSupport->senderTitle = $title;
        $objSupport->senderMessage = $message;
        // Sending email to Admin from contact form
        Mail::to($objSupport->email)->send(new TaskEmail($objSupport));
    }

    public function finishJob(Task $job)
    {

        if( Auth::user()->is_admin ) {
            $result = $job->update(['finish' => request()->has('finish')]);
            if ($result) {
                //DepartmentTask::where('task_id',$job->id)->update(['is_late' => false]);
                //DepartmentTask::where('task_id',$job->id)->update(['is_finish' => true]);
                return back()->with('message', 'Task status changed.');
            }
            return back()->with('message', 'The Task status cannot be changed.');
        }
        return back()->with('message', 'Nemate Admin permisije za izabranu operaciju');
    }
}
