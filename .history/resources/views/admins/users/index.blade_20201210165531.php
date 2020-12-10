
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



<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
            <div class="modal-content">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <div class="modal-body">
                    <div class="container login createUser">
                         <div class="wrap-form">
                            <div class="form-header">
                                <i class="fa fa-plus" aria-hidden="true"></i>Kreiraj korisnika
                            </div>
                            <form action="" method="">
                                <div class="form-group">
                                    <input type="email" class="form-control" name="user_email" placeholder="Email">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control"  name="user_pass" placeholder="Šifra">
                                </div>

                                <div class="form-group">
                                    <select class="custom-select custom-select-lg mb-3">
                                        <option selected>Dodeli sektor</option>
                                        <option value="3">Dizajn</option>
                                        <option value="2">Produkcija</option>
                                        <option value="3">Dorada</option>
                                        <option value="3">Isporuka</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <select class="custom-select custom-select-lg mb-3">
                                        <option selected>Dodeli rolu</option>
                                        <option value="1">Menadžer</option>
                                        <option value="2">Korisnik</option>
                                        <option value="3">Monitor</option>
                                    </select>
                                </div>
                                <button type="submit" name="submit" class="btn btn-primary">Kreiraj korisnika</button>
                            </form>

                        </div>
                     </div>
                </div>

            </div>
            </div>
        </div>







@endsection
