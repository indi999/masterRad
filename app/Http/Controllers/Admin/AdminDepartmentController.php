<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Http\Request;
use App\Models\Department;

class AdminDepartmentController extends Controller
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
        if(Auth::user()->is_admin){
            $departments = Department::all();
            return view('admins.departments.index',compact('departments'));
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
        if(Auth::user()->is_admin){
            return view('admins.deparments.create');
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
        if(Auth::user()->is_admin){
            $attributes = request()->validate( [
                'name' => ['required', 'string', 'max:50'],
            ]);

            $attributes['created_by'] = auth()->user()->id;
            $attributes['modified_by'] = auth()->user()->id;

            $deparment = Department::create($attributes);

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
     * @param  \App\Models\Department  $deparment
     * @return \Illuminate\Http\Response
     */
    public function show(Department $deparment)
    {
        if(Auth::user()->is_admin){
            return view('admins.deparments.show', compact('deparment'));
        }
        return back()->with('message', 'you have not permition!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Department  $deparment
     * @return \Illuminate\Http\Response
     */
    public function edit(Department $deparment)
    {
        if(Auth::user()->is_admin) {
            return view('admins.deparments.edit', compact('deparment'));
        }
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
        if(Auth::user()->is_admin) {
            //dd(request()->all());
            // VALIDACIJA
            $attributes = request()->validate([
                'name' => ['required', 'string', 'max:50'],
            ]);

            $attributes['modified_by'] = auth()->user()->id;

            $result = $deparment->update($attributes);
            //dd($category, $result);
            if ($result) {
                return back()->with('message', 'Deparment is updated seccseful!');
            }
            return back()->with('message', 'Deparment not updated!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Department  $deparment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Department $sektor)
    {
        if( Auth::user()->is_admin ) {
            $result = $sektor->delete();
            if($result){
                return back()->with('message', 'Sektor je obrisan.');
            }
            return back()->with('warnings', 'Sektor nije moguce obrisati');
        }
        return back()->with('message', 'Nemate Admin permisije za izabranu operaciju');

    }

}
