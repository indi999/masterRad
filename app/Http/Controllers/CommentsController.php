<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

use App\Models\Comment;
use App\Models\Task;
use App\Http\Classes\Comments as ServiceComments;


class CommentsController extends Controller
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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Task $task)
    {
        if( Auth::user()) {
            $attributes = request()->validate([
                'body' => 'required|string|max:10000',
            ]);
            /*
            $attributes['task_id'] = $task->id;
            $attributes['created_by'] = auth()->user()->id;
            $attributes['modified_by'] = auth()->user()->id;
            //Comment::create($attributes);
            */
            //dd(request()->all(), $task, $attributes);
            $task->addComment($task->id, $attributes['body']);
            return back();
        }
    }

    public function update(Task $task, Comment $comment)
    {
        if (Auth::user()->is_admin) {
            $attributes = request()->validate([
                'task_id' => 'required|integer',
                'body' => 'required|string|max:10000',
            ]);
            $attributes['modified_by'] = auth()->user()->id;

            $comment->update($attributes);
            return back();
        }
    }
}
