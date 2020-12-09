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
    <link href="{{ asset('assets/css/datePicker.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/timePicker.css') }}" rel="stylesheet">
</head>
<body>



@if(Auth::guest())
    <nav class="navbar navbar-expand-lg">
        <a class="navbar-brand" href="#">Login</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
        </div>
        <img src="{{asset('assets/img/white-fps.png')}}" class="logo" alt="">
    </nav>
 @else
    @if (\Request::is('login') || Auth::guest())
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
            <!--<span class="date">{{ date('Y-m-d') }}</span>-->
            @if(Route::is('home') )
                <a class="navbar-brand" href="#">Job Manager / Lista poslova</a>

                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('jobs.create') }}">Dodaj posao</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Logout</a>
                    </li>
                </ul>

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

    @if ( auth()->user()->role == 'user')
    
                <?php $sectorName = auth()->user()->department->name;?>
                @switch($sectorName)
                    @case('DIZAJN/PRIPREMA')
                         <nav class="navbar navbar-expand-lg design">
                         @break
                    @case('PRODUKCIJA')
                        <nav class="navbar navbar-expand-lg production">
                        @break
                    @case('DORADA')
                         <nav class="navbar navbar-expand-lg add">
                        @break
                    @case('ISPORUKA')
                         <nav class="navbar navbar-expand-lg delivery">
                        @break
                    @default
                     <nav class="navbar navbar-expand-lg">
                @endswitch
        
            <a class="navbar-brand" href="#">{{ auth()->user()->department->name}}</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">

                  <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>
                             <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </div>
            <img src="{{asset('assets/img/white-fps.png')}}" class="logo" alt="">
        </nav>
    @endif
@endif


    <main class="py-4">
        @yield('content')
    </main>

 @include('layouts.footer')
