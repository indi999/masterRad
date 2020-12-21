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

    @if(auth()->user()->role == 'manager')
        <nav class="navbar navbar-expand-lg">
        <!--<span class="date">{{ date('Y-m-d') }}</span>-->
            <a class="navbar-brand" href="#">Job Manager / Lista poslova</a>

            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('jobs.create') }}">Dodaj posao</a>
                </li>

                 <li class="nav-item">
                    <a class="nav-link" href="{{ route('jobs.create') }}">Lista poslova</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('jobs.arhive') }}">Arhiva</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"> {{ __('Logout') }}
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </li>
            </ul>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <img src="{{asset('assets/img/white-fps.png')}}" class="logo" alt="">
            <div class="collapse navbar-collapse" id="navbarSupportedContent">

            </div>
        </nav>

    @elseif( auth()->user()->role == 'user')
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
                            <a class="nav-link" href="{{ route('jobs.arhive') }}">Arhiva</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"> {{ __('Logout') }}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </div>
                <img src="{{asset('assets/img/white-fps.png')}}" class="logo" alt="">
            </nav>
    @elseif( auth()->user()->role == 'monitor')
            <nav class="navbar navbar-expand-lg">
                <a class="navbar-brand" href="#">{{ auth()->user()->role}}</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"> {{ __('Logout') }}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </div>
                <img src="{{asset('assets/img/white-fps.png')}}" class="logo" alt="">
            </nav>
    @elseif( auth()->user()->role == 'customer')

    @else

    @endif

@endif


