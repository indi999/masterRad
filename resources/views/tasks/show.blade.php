@extends('layouts.master')
@section('content')

<main>
    <div class="part-table justify-content-center">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">

                    <div class="table-responsive  table-striped table-bordered">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">Radni Nalog Broj: #{{$job->number}}</th>
                                <th class="delete-user">
                                    <button type="submit" class="btn del-job" id="{{ $job->id }}" data-toggle="modal" data-target="#exampleModal-{{ $job->id }}">
                                        <i class="fa fa-edit"></i>
                                    </button>
                                </th>
                                <th class="delete-user">
                                    <button type="submit" class="btn del-job" id="{{ $job->id }}" data-toggle="modal" data-target="#exampleModal-{{ $job->id }}">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </th>

                            </tr>
                            </thead>
                            <tbody>

                            <tr>
                                <td>
                                    <div class="jumbotron">
                                        <p class="lead">Opis posla: </p>
                                        <hr class="my-4">
                                        <p class="my-4 ">{{$job->desc}}</p>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Prilozi: PDF,WORD,CSV</td>
                            </tr>
                            <tr>
                                <td>Manager: {{$job->number}}</td>
                            </tr>
                            <tr>
                                <td>Brend: {{$job->brand}}</td>
                            </tr>
                            <tr>
                                <td>Klijent: {{$job->client}}</td>
                            </tr>
                            <tr>
                                <td>Prodaja: {{$job->saller->firstname}} {{$job->saller->lastname}}</td>
                            </tr>

                            <tr>
                                <td>Responsible Department: XXX</td>
                            </tr>

                            <tr>
                                <td scope="row">{{ date('Y-m-d', strtotime($job->date_end)) }}
                                    <i class="fa fa-calendar" aria-hidden="true"></i></td>
                            </tr>

                            <!-- Comment -->
                            <tr>
                                <td scope="row">
                                    @include('admins.tasks.comments')
                                </td>
                            </tr>

                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>
</main>

@endsection
