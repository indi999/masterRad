<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Models\Comment;
use App\Http\Classes\Comments as ServiceComments;

class AdminCommentsController extends Controller
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
    public function store()
    {
        if( Auth::user()->is_admin) {
            $attributes = request()->validate([
                'user_id' => ['required|integer'],
                'task_id' => ['required|integer'],
                'body' => ['required|string|max:10000'],
            ]);
            $attributes['user_id'] = auth()->user()->id;
            $attributes['created_by'] = auth()->user()->id;
            $attributes['modified_by'] = auth()->user()->id;

            Comment::create($attributes);

            return back();
        }
    }

    public function update(Comment $comment)
    {
        if (Auth::user()->is_admin) {
            $attributes = request()->validate([
                'user_id' => ['required|integer'],
                'task_id' => ['required|integer'],
                'body' => ['required|string|max:10000'],
            ]);
            $attributes['modified_by'] = auth()->user()->id;

            $comment->update($attributes);
            return back();
        }
    }
}
