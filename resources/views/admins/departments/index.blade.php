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
                                            <button type="submit" class="btn del-job" id="{{ $department->id }}" data-toggle="modal" data-target="#exampleModal-{{ $department->id }}">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                            <!-- delete modal -->
                                            <div class="modal fade" id="exampleModal-{{ $department->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Da li si siguran da želiš da obrišeš posao?</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="container deleteUser createUser">
                                                                <div class="wrap-form">

                                                                    <form action="{{ route('admin.sektors.destroy', ['sektor' => $department->id]) }}" method="post">
                                                                        @method('delete')
                                                                        @csrf

                                                                        <button type="submit" class="btn btn-danger"> {{ __('Obriši') }}</button>
                                                                        <button type="submit" class="btn btn-primary" data-dismiss="modal" aria-label="Close">
                                                                            {{ __('Ne') }}
                                                                        </button>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
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