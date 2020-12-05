@extends('layouts.app')

@section('content')
    <div class="container login">
        <div class="row">
            <div class="col-md-12">
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="form-group">
                    <input type="text" class="form-control" name="user_name" placeholder="Username" required>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control"  name="user_pass" placeholder="Password" required>
                </div>
                <button type="submit" name="submit" class="btn btn-primary">Login</button>
            </form>
            </div>
        </div>
    </div>
@endsection
