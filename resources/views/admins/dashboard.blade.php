@extends('admins.layouts.master')

@section('content')
<<<<<<< HEAD
=======
    <!-- Content -->
    <h1>ADMIN PANEL</h1>

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

    @include('admins.tasks.create')
>>>>>>> abb09a63dbb01f8447611288b62a507d941374bb

    <main>
        <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="part-table admin-table">
                    @include('admins.tasks.index')
                </div>
            </div>
        </div>
    </div>
    </main>

@endsection
