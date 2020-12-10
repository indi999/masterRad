
@extends('admins.layouts.master')

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



 <div class="part-table">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">

                <div class="add-btn">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Dodaj korisnika</button>
                </div>

                <div class="table-responsive  table-striped table-bordered">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">id</th>
                                <th scope="col">Email</th>
                                <th scope="col">Sektor</th>
                                <th scope="col">Rola</th>
                            </tr>
                        </thead>
                        <tbody>
                           @if($users->count()>0)
                            @foreach($users as $user)
                                 <tr>
                                    <th scope="row">{{$user->id}}</th>
                                    <td>{{$user->email}}</td>
                                    <td>{{$user->role}}</td>
                                    <td>{{$user->status}}</td>
                                    <td class="delete-user">
                                        <a href="#">Obriši</a>
                                    </td>
                                </tr>
                            @endforeach
                        @endif

                        </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

       @include('admins.users.create')
@endsection
