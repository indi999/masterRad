@extends('admins.layouts.master')

@section('content')

<h3>JOB Show{{$job->id}}</h3>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="part-table admin-table">

                <!-- Succes message -->
                @if(session('message'))
                    <div class="alert alert-success">
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

                <div class="table-responsive  table-striped table-bordered">
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">Broj naloga: {{$job->number}}</th>
                        <tr>
                        </thead>
                        <tbody>
                        <div class="table-responsive  table-striped table-bordered">
                            <table class="table">
                                <thead>
                                <tr>
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
                                    <th style="color#0d1e31" scope="col"></th>
                                    <th class="" scope="col">Status projekta</th>
                                <tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>

                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        </tbody>
                    </table>
                </div>


@endsection
