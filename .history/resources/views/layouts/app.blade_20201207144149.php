<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
</head>
<body @if ( auth()->user()->role == 'manager' && Route::is('jobs.index')) class="white-bg" @endif>


@if (\Request::is('login'))
     <nav class="navbar navbar-expand-lg">
        <a class="navbar-brand" href="#">Login</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
          </div>
        <img src="{{asset('assets/img/white-fps.png')}}" class="logo" alt="">
    </nav>
@endif


@if ( auth()->user()->role == 'manager')
    <nav class="navbar navbar-expand-lg">
        <span class="date">{{ date('Y-m-d') }}</span>

        @if(Route::is('jobs.index') )
            <a class="navbar-brand" href="#">Job Manager / Lista poslova</a>
            @if(Route::is('jobs.index') )
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('home') }}">Dodaj posao</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Logout</a>
                    </li>
                </ul>
            @endif
        @else
             <a class="navbar-brand" href="#">Job Manager / Unos poslova</a>
        @endif


        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <img src="{{asset('assets/img/white-fps.png')}}" class="logo" alt="">
         <div class="collapse navbar-collapse" id="navbarSupportedContent">

        </div>
    </nav>
@endif

    <main class="py-4">
        @yield('content')
    </main>

 @include('layouts.footer')
