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
                                        <td class="design" scope="col">Dizajn/priprema</td>
                                        <td class="poduction" scope="col">Produkcija</td>
                                        <td class="add" scope="col">Dorada</td>
                                        <td class="delivery" scope="col">Isporuka</td>
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


                                <!-- ARHIVA JOBS -->
                                    @if($tasks->count()>0)
                                        @foreach($tasks as $task)
                                            <tr>
                                                <th scope="row">{{$task->number}}</th>
                                                <th scope="row">{{$task->brand}}</th>
                                                <th scope="row">{{$task->client}}</th>
                                                <th scope="row">{{$task->sale}}</th>
                                                <th scope="row">{{$task->desc}}</th>
                                                <th scope="row">{{$task->date_end}} <i class="fa fa-calendar" aria-hidden="true"></i></th>
                                                <th scope="row">{{$task->expected_date_end}}</th>
                                                 @foreach($task->departments as $department)
                                                    <th scope="row">{{$department->name}} - {{$department->pivot->status}} <i class="fa fa-calendar" aria-hidden="true"></i></th>
                                                @endforeach

                                            </tr>





                                        @endforeach
                                    @endif

                                @endsection











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
