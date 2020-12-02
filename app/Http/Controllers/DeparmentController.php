<?php

namespace App\Http\Controllers;

use App\Models\Deparment;
use Illuminate\Http\Request;

class DeparmentController extends Controller
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
     * @param  \App\Models\Deparment  $deparment
     * @return \Illuminate\Http\Response
     */
    public function show(Deparment $deparment)
    {
        return view('deparments.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Deparment  $deparment
     * @return \Illuminate\Http\Response
     */
    public function edit(Deparment $deparment)
    {
        return view('deparments.edit');
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
        //
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
