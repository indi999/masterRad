@extends('admins.layouts.master')

@section('content')

<<<<<<< HEAD
    <h1>Show Task</h1>

    <div class="container login createUser">
        <div class="wrap-form">
            <div class="form-header">
                <i class="fa fa-plus" aria-hidden="true"></i>Kreiraj monitor
            </div>
            <div class="form-group">
                <input type="email" class="form-control" name="email" placeholder="Email" autocomplete="off">
                @error('email')
                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                @enderror
            </div>

            <div class="form-group">
                <div class="form-group ">
                    <input type="password" class="form-control"  name="password" placeholder="Šifra" class="form-control @error('password') is-invalid @enderror" required autocomplete="new-password">
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                                         <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>

                <div class="form-group ">
                    <input id="password-confirm" type="password" class="form-control"  name="password_confirmation" placeholder="Potvrda Šifre" name="password_confirmation" required autocomplete="new-password">
                </div>
            </div>

            <div class="form-group">
                <select class="custom-select custom-select-lg mb-3" name="department_id">
                    <option value="0">Svi</option>
                </select>
                @error('department_id')
                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                @enderror
            </div>

            <div class="form-group">
                <select class="custom-select custom-select-lg mb-3" name="role">
                    <option value="monitor" selected>Monitor</option>
                </select>
                @error('role')
                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                @enderror
            </div>

            <!-- comments -->

        </div>
    </div>
=======
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

>>>>>>> master

@endsection
