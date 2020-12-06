<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
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
        return view('deparments.index');
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Department  $deparment
     * @return \Illuminate\Http\Response
     */
    public function show(Department $deparment)
    {
        return view('deparments.show',compact('deparment'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Department  $deparment
     * @return \Illuminate\Http\Response
     */
    public function edit(Department $deparment)
    {
        return view('deparments.edit',compact('deparment'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Department  $deparment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Department $deparment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Department  $deparment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Department $deparment)
    {
        //
    }
}
