<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\UserRegistration;
use Auth;
use \Mail;
use Illuminate\Http\Request;

use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

use App\Models\User;
use App\Models\Task;

class AdminUsersController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $users = User::all();
        return view('admins.users.index',compact('users'));
    }

    public function employees()
    {
        $users = User::where('role','=','user')->get();
        return view('admins.users.employees',compact('users'));
    }

    public function managers()
    {
        $users = User::where('role','=','manager')->get();
        return view('admins.users.managers',compact('users'));
    }

    public function monitor()
    {
        $users = User::where('role','=','monitor')->get();
        return view('admins.users.managers',compact('users'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        //dd(request()->all(),request('firstname'),request('lastname'));
        $attributes = request()->validate( [
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'department_id' => ['required', 'integer', 'max:10'],
            'role' => ['required', 'string', 'max:50'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            //'firstname' => ['required', 'string', 'max:255'],
            //'lastname' => ['required', 'string', 'max:255'],
        ]);

        if(request('firstname')!= null){
            request()->validate(['firstname' => 'required|string|max:255']);
            $attributes['firstname'] = request('firstname');
        }else{
            $attributes['firstname'] = 'nema informacija';
        }

        if(request('lastname')!= null){
            request()->validate(['lastname' => 'required|string|max:255']);
            $attributes['lastname'] = 'nema informacija';
        }else{
            $attributes['lastname'] = request('lastname');
        }

        //Password
        $attributes['password'] = Hash::make($attributes['password']);

        //dd($attributes);
        $user = User::create($attributes);

        if($user){
            $name = $attributes['firstname']." ". $attributes['lastname'];
            $title = "title for the email";
            $message = "Message for new user"." ". " with "."  useremail:".$attributes['email']." "." , password: ".$attributes['password'];
            //$this->send($name, $attributes['email'], $title, $message);

            return back()->with('message','New user is create!');
        }
        return back()->with('message', 'User not created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('admins.users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('admins.users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //dd($user);
        if( Auth::user()->is_admin ) {

            if($user->role == 'manager') {
                //DepartmentTask::where('task_id', $job->id)->delete();
                //$tasks = Task::where('user_id',$user->id)->delete();
                $result = $user->update([
                    'status' => false
                ]);
                if($result){
                    return back()->with('message', 'The Manager has been blocked.');
                }
                return back()->with('message', 'Can not blocked.');
            }
            $result = $user->delete();
            if($result){
                return back()->with('message', 'The user has been deleted.');
            }
            return back()->with('warnings', 'Can not user delete!');

        }
    }

    public function status(User $user)
    {
        $result = $user->update([
            'status' => request()->has('status')
        ]);
        if($result ){
            return back()->with('message', 'User status changed.');
        }else{
            return back()->with('warnings', 'The status of the User cannot be changed.');
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
        Mail::to($objSupport->email)->send(new UserRegistration($objSupport));
    }

}
