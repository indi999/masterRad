<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;
use Auth;

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
            return view('admins.deshboard');
        }

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        if( Auth::user()->is_admin )  {

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
        if( Auth::user()->is_admin )  {

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
        if( Auth::user()->is_admin )  {

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
