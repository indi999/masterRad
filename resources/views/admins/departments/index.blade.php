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

    <!-- Departments -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="part-table admin-table">
                    <div class="add-btn">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Dodaj sektor</button>
                    </div>

                    <div class="table-responsive  table-striped table-bordered">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">id</th>
                                <th scope="col">Ime sektora</th>
                            </tr>
                            </thead>
                            <tbody>
                                <tr>
                                @if($departments->count()>0)
                                    @foreach($departments as $department)
                                    <th scope="row">{{$department->id}}</th>
                                        <td>{{$department->name}}</td>
                                        <td class="delete-user">
                                            <a href="#">Obriši</a>
                                        </td>
                                    </tr>
                                    @endforeach
                                @endif
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- departments create -->
    @include('admins.departments.create')


@endsection