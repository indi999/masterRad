<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\Deparment;
use Illuminate\Http\Request;

class AdminDeparmentController extends Controller
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
        if(Auth::user()->is_admin == true){
            $deparments = Deparment::all();
            return view('admins.deparments.index',compact('deparments'));
        }
        return back()->with('message', 'you have not permition!');
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
        if(Auth::user()->is_admin == true){
            $attributes = request()->validate( [
                'name' => ['required', 'string', 'max:50'],
            ]);

            $deparment = Deparment::create($attributes);

            if($deparment){
                return back()->with('message', 'New deparment created seccseful!');
            }
            return back()->with('message', 'Deparment not created!');
        }
        return back()->with('message', 'you have not permition!');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Deparment  $deparment
     * @return \Illuminate\Http\Response
     */
    public function show(Deparment $deparment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Deparment  $deparment
     * @return \Illuminate\Http\Response
     */
    public function edit(Deparment $deparment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Deparment  $deparment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Deparment $deparment)
    {
        //dd(request()->all());
        // VALIDACIJA
        $attributes = request()->validate( [
            'name' => ['required', 'string', 'max:50'],
        ]);

        $result = $deparment->update($attributes);
        //dd($category, $result);
        if($result){
            return back()->with('message', 'Deparment is updated seccseful!');
        }
        return back()->with('message', 'Deparment not updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Deparment  $deparment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Deparment $deparment)
    {
        //
    }
}
