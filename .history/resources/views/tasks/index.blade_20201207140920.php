@extends('layouts.app')

@section('content')




      <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="part-table admin-table">


                        <div class="table-responsive  table-striped table-bordered">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">Broj naloga</th>
                                        <th scope="col">Brend</th>
                                        <th scope="col">Klijent</th>
                                        <th scope="col">Prodaja</th>
                                        <th scope="col">Opis posla</th>
                                        <th scope="col">Planirani završetak</th>
                                        <th scope="col">Očekivani završetak</th>
                                        <th class="design" scope="col">Dizajn/priprema</th>
                                        <th class="poduction" scope="col">Produkcija</th>
                                        <th class="add" scope="col">Dorada</th>
                                        <th class="delivery" scope="col">Isporuka</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row">123</th>
                                        <td>Schell</td>
                                        <td>joe@gmail.com</td>
                                        <td>Marjan S.</td>
                                        <td>Counter Display</td>
                                        <td>31.12.2020 <i class="fa fa-calendar" aria-hidden="true"></i><i class="fa fa-check" aria-hidden="true"></i></td>
                                        <td class="complete">
                                            31.12.2020
                                        </td>
                                        <td>21.12.2020 <i class="fa fa-calendar" aria-hidden="true"></i><i class="fa fa-check" aria-hidden="true"></i></td>
                                        <td>15.12.2020 <i class="fa fa-calendar" aria-hidden="true"></i><i class="fa fa-check" aria-hidden="true"></i></td>
                                        <td>15.12.2020 <i class="fa fa-calendar" aria-hidden="true"></i><i class="fa fa-check" aria-hidden="true"></i></td>
                                        <td>15.12.2020 <i class="fa fa-calendar" aria-hidden="true"></i><i class="fa fa-check" aria-hidden="true"></i></td>
                                        <td class="delete-user">
                                            <a href="#">Obriši</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">123</th>
                                        <td>Durex</td>
                                        <td>joe@gmail.com</td>
                                        <td>Marjan S.</td>
                                        <td>Counter Display</td>
                                        <td>31.12.2020 <i class="fa fa-calendar" aria-hidden="true"></i><i class="fa fa-check" aria-hidden="true"></i></td>
                                        <td class="alert-job">
                                            31.12.2020
                                            <i class="fa fa-calendar" aria-hidden="true" data-toggle="modal" data-target="#modalDate"></i>
                                        </td>
                                        <td>21.12.2020 <i class="fa fa-calendar" aria-hidden="true"></i><i class="fa fa-check" aria-hidden="true"></i></td>
                                        <td>15.12.2020 <i class="fa fa-calendar" aria-hidden="true"></i><i class="fa fa-check" aria-hidden="true"></i></td>
                                        <td><i class="fa fa-calendar" aria-hidden="true"></i></i><i class="fa fa-close" aria-hidden="true"></i></td>
                                        <td>15.12.2020 <i class="fa fa-calendar" aria-hidden="true"></i><i class="fa fa-check" aria-hidden="true"></i></td>
                                        <td class="delete-user">
                                            <a href="#">Obriši</a>
                                        </td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>







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


<!-- ARHIVA JOBS -->
    @if($tasks->count()>0)
        @foreach($tasks as $task)
            <ul>
                <li>{{$task->number}}</li>
                @foreach($task->departments as $department)
                    <ul>
                        <li>{{$department->name}}</li>
                        <li>{{$department->pivot->status}}</li>
                    </ul>
                @endforeach
                <li>{{$task->brand}}</li>
            </ul>
        @endforeach
    @endif

@endsection
