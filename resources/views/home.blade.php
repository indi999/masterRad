@extends('layouts.app')

@section('content')
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



    @if(auth()->user->role == 'manager')
        @include('tasks.create')
    @else

    @if($tasks->count()>0)
            @foreach($tasks as $task)
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
     @endif


@endsection
