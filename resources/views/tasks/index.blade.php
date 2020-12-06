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


<!-- ARHIVA JOBS -->
    @if($tasks->count()>0)
        @foreach($tasks as $task)
            <ul>
                <li>{{$task->number}}</li>
                @foreach($task->departments as $department)
                    <ul>
                        <li>{{$department->name}}</li>
                    </ul>
                @endforeach
            </ul>
        @endforeach
    @endif

@endsection
