@extends('admins.layouts.master')

@section('content')

<h1>Show Task</h1>




<div class="container login createUser">
    <div class="wrap-form">
        <div class="form-header">
            <i class="fa fa-hashtag" aria-hidden="true"></i>{{$job->number}}
        </div>
        <form action="{{route('admin.sektors.store')}}" method="post" role="form">
            @csrf

            <div class="form-group">
                <input type="text" class="form-control" name="name" placeholder="Ime sektora">
            </div>

        </form>

    </div>
</div>


</br>
<!-- Comment -->
<div class="container login createUser">
    <div class="wrap-form">
        <div class="form-header">
            <i class="fa fa-plus" aria-hidden="true"></i>Kreiraj sektor
        </div>
        <form action="{{route('admin.sektors.store')}}" method="post" role="form">
            @csrf

            <div class="form-group">
                <input type="text" class="form-control" name="name" placeholder="Ime sektora">
            </div>
            <button type="submit" name="submit" class="btn btn-primary">Kreiraj sektor</button>
        </form>

    </div>
</div>

@endsection
