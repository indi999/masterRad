@extends('admins.layouts.master')

@section('content')

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

@endsection
