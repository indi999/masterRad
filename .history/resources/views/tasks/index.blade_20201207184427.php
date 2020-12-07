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

                                    <!-- ARHIVA JOBS -->
                                    @if($tasks->count()>0)
                                        @foreach($tasks as $task)


                                            <tr>
                                                <th scope="row">{{$task->number}}</th>
                                                <td scope="row">{{$task->brand}}</td>
                                                <td scope="row">{{$task->client}}</td>
                                                <td scope="row">{{$task->sale}}</td>
                                                <td scope="row">{{$task->desc}}</td>
                                                <td scope="row">{{$task->date_end}} <i class="fa fa-calendar" aria-hidden="true"></i></td>
                                                <td scope="row">{{$task->expected_date_end}}</td>
                                                 @foreach($task->departments as $department)
                                                    <!--<td scope="row">{{$department->name}} - {{$department->pivot->status}} <i class="fa fa-calendar"
                                                        aria-hidden="true"></i></td>-->

                                                    @if($department->pivot->status == 0)
                                                    <td scope="row">wsdwdwd <i class="fa fa-calendar"
                                                        aria-hidden="true"></i></td>

                                                    @endif




                                                @endforeach
                                                <td class="delete-user">
                                                    <a href="#">Obriši</a>
                                                </td>
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
