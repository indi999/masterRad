
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
                                <ul>
                                    <li>{{$user->email}}</li>
                                </ul>

                                 <tr>
                                    <th scope="row">1</th>
                                    <td>{{$user->email}}</td>
                                    <td>Dizajn</td>
                                    <td>Korisnik</td>
                                    <td class="delete-user">
                                        <a href="#">Obriši</a>
                                    </td>
                                </tr>


                            @endforeach
                        @endif

                        <h3>modal</h3>
                        @include('admins.users.create')









                        </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>












@endsection
