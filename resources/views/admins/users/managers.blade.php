@extends('admins.layouts.master')

@section('content')


    <h3>All Managers</h3>

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
                <li>{{$user->role}}</li>
            </ul>
        @endforeach
    @endif

    <h3>modal</h3>
    @include('admins.users.create')

@endsection