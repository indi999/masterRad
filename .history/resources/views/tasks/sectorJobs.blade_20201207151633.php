@extends('layouts.app')

@section('content')

    <h1>JOBS  Sektor:{{ auth()->user()->department->name}} / ROLE: {{ auth()->user()->role}}</h1>

    <!-- Succes message -->
    @if(session('message'))
        <div class="alert alert-danger">
            {{session('message')}}
        </div>
    @endif
    <!-- Error message -->
    @if(count($errors)>0)
        @foreach($errors->all() as $error)
            <div class="alert alert-danger">
                {{$error}}
            </div>
        @endforeach
    @endif


<!-- Sector JOBS -->
    @if($tasks->count()>0)
        @foreach($tasks as $task)
            <!-- if jobs for deparment -->
            @foreach($task->departments as $department)
                @if($department->name == auth()->user()->department->name)
                    <ul>
                        <li>{{$task->number}}</li>
                        <li>{{$department->name}}</li>
                        <li>{{$task->brand}}</li>
                        <li>{{$department->pivot->status}}</li>
                    </ul>
                @endif
            @endforeach

        @endforeach
    @endif

@endsection
