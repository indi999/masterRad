@extends('layouts.app')

@section('content')
    <!-- Content -->
    <h1>Manager PANEL</h1>

    <h1>User PANEL</h1>

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

    @include('tasks.create')

@endsection
