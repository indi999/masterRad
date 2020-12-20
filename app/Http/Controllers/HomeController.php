<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\User;
use Auth;

class HomeController extends Controller
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

    public function welcome()
    {
          $user = Auth::user();
          if($user->role == 'manager')  {
              // if manager
              $tasks = Task::where('finish', false)->where('user_id','=', $user->id)->get();
              return view('home', compact('tasks'));
          }
          if($user->role == 'monitor'){
                // if manager
                $tasks = Task::where('finish', true)->get();
                return view('tasks.monitor', compact('tasks'));
          }

          $tasks = Task::where('finish', false)->get();
          return view('tasks.sectorJobs', compact('tasks'));
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function home()
    {

         $user = Auth::user();
        if($user->role == 'manager')  {
          // if manager
          $tasks = Task::where('finish', false)->where('user_id','=', $user->id)->get();
          return view('home', compact('tasks'));
        }
        if($user->role == 'monitor'){
            // if manager
            $tasks = Task::where('finish', true)->get();
            return view('tasks.monitor', compact('tasks'));
        }
      // if employees
      //$tasks = Task::where('finish', false)->departments()->where('name','=',$user->department->name)->get();
      $tasks = Task::where('finish', false)->get();
      return view('tasks.sectorJobs', compact('tasks'));

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function dashboard()
    {
        if( Auth::user()->is_admin )  {
            // if manager
            $tasks = Task::where('finish', false)->get();
            return view('admins.tasks.index', compact('tasks'));
        }
    }
}
