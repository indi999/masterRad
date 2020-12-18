<nav class="navbar navbar-expand-lg admin">
    <a class="navbar-brand" href="#">Administrator / Lista poslova</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link" href="{{ route('admin.jobs.create') }}">Kreiraj posao</a>
            </li>

            <li class="nav-item active">
              <a class="nav-link" href="{{ route('admin.users.index') }}">Korisnici</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('admin.sektors.index') }}">Sektori</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.jobs.index') }}">Lista Poslova</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.jobs.arhive') }}">Arhiva Poslova</a>
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
    </div>
</nav>
