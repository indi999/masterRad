@extends('layouts.app')

@section('content')

    <h1>Employees</h1>

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

    @if($users->count()>0)
        @foreach($users as $user)
            <ul>
                <li>{{$user->email}}</li>
            </ul>
        @endforeach
    @endif

@endsection

