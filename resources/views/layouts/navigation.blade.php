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
            @if(Route::is('jobs.index') || Route::is('home'))
                <a class="navbar-brand" href="#">Job Manager / Lista poslova</a>
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('jobs.create') }}">Dodaj posao</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                           document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
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
        <nav class="navbar navbar-expand-lg design">
            <a class="navbar-brand" href="#">{{ auth()->user()->department->name}}</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">

                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                           document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </li>
                </ul>
            </div>
            <img src="{{asset('assets/img/white-fps.png')}}" class="logo" alt="">
        </nav>
    @endif
@endif

