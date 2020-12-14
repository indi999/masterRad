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
    }

    public function arhive()
    {
        if( Auth::user()->is_admin )  {
            $tasks = Task::where('finish', true)->get();
            return view('admins.tasks.index', compact('tasks'));
        }
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

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        //dd(request()->all());
        if( Auth::user()->is_admin )  {

            $attributes = request()->validate( [
                'number' => ['required', 'integer', 'unique:tasks'],
                'user_id' => ['required', 'integer', 'max:10'],
                'brand' => ['required', 'string', 'max:50'],
                'client' => ['required', 'string', 'max:50'],
                'sale' => ['required', 'string', 'max:255'],
                'desc' => ['required', 'string', 'max:1000'],
                'date_end' => ['required', 'string', 'max:1000'],
                //'time_end' => ['required', 'string', 'max:1000'],
            ]);
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

                return redirect()->route('admin.dashboard')->with('message', 'Novi Posao je kreiran!');
            }
            return back()->with('message', 'Novi posao nije moguce kreirati');
        }
        return back()->with('message', 'Nemate Admin permisije za izabranu operaciju');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function show(Task $task)
    {
        if( Auth::user()->is_admin )  {
            return view('admins.tasks.show', compact('task'));
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
        if( Auth::user()->is_admin )  {
            return view('admins.tasks.edit', compact('task'));
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
        if( Auth::user()->is_admin ) {

        }
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
}
