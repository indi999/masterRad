<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\UserRegistration;
use Auth;
use \Mail;
use Illuminate\Http\Request;

use App\Models\User;

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
        $attributes = request()->validate( [
            'email' => ['required', 'string', 'max:255'],
            'department_id' => ['required', 'integer', 'max:10'],
            'role' => ['required', 'string', 'max:50'],
            'firstname' => ['required', 'string', 'max:255'],
            'lastname' => ['required', 'string', 'max:255'],
            'password' => ['required', 'string', 'max:255'],
        ]);
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
    public function destroy($id)
    {
        //
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
