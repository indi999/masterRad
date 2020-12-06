@extends('admins.layouts.master')

@section('content')

    <h3>List of Jobs</h3>

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

    @if($tasks->count()>0)
        @foreach($tasks as $task)
            <ul>
                <li>{{$task->name}}</li>
            </ul>
        @endforeach
    @endif

@endsection