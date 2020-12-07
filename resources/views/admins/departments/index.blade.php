@extends('admins.layouts.master')

@section('content')


    <h3>All Sector</h3>

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



    <h3>modal</h3>
    @include('admins.departments.create')


    @if($departments->count()>0)
        @foreach($departments as $department)
            <ul>
                <li>{{$department->name}}</li>
            </ul>
        @endforeach
    @endif

@endsection