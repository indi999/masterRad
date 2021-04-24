
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
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalMonitor">Dodaj monitor</button>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalProdavac">Dodaj prodavca</button>
                </div>


                <div class="table-responsive  table-striped table-bordered">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">id</th>
                                <th scope="col">Ime</th>
                                <th scope="col">Prezime</th>
                                <th scope="col">Email</th>
                                <th scope="col">Sektor</th>
                                <th scope="col">Rola</th>
                                <th scope="col">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                           @if($users->count()>0)
                            @foreach($users as $user)
                                @if(!$user->is_admin)

                                 <tr>
                                    <th scope="row">{{$user->id}}</th>
                                    <th scope="row">{{$user->firstname}}</th>
                                    <th scope="row">{{$user->lastname}}</th>
                                    <td>{{$user->email}}</td>
                                    <td>
                                        @if($user->role == 'manager' || $user->role =='monitor' || $user->role =='prodavac')
                                            {{"SVI"}}
                                        @else
                                            {{$user->department->name}}
                                        @endif
                                    </td>
                                    <td>{{$user->role}}</td>
                                    <td>{{$user->status ? "Aktivan" : "Neaktivan"}}</td>
                                     <td class="delete-user">
                                         <button type="submit" class="btn del-job" id="{{ $user->id }}" data-toggle="modal" data-target="#exampleModal-{{ $user->id }}">
                                             <i class="fa fa-trash"></i>
                                         </button>
                                     </td>
                                     <div class="modal fade" id="exampleModal-{{ $user->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                         <div class="modal-dialog" role="document">
                                             <div class="modal-content">
                                                 <div class="modal-header">
                                                     <h5 class="modal-title" id="exampleModalLabel">Da li si siguran da želiš da obrišeš korisnika?</h5>
                                                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                         <span aria-hidden="true">&times;</span>
                                                     </button>
                                                 </div>
                                                 <div class="modal-body">
                                                     <div class="container deleteUser createUser">
                                                         <div class="wrap-form">

                                                             <form action="{{ route('admin.users.destroy', ['user' => $user->id] )}}" method="post">
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
                                </tr>
                                 @endif
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
