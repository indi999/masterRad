
  <nav class="navbar navbar-expand-lg admin">
        <span class="date">30/10/2020</span>
        <a class="navbar-brand" href="#">Administrator / Lista poslova</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <img src="{{asset('img/white-fps.png')}}" class="logo" alt="">
         <a class="" href="{{ route('logout') }}"
            onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
            {{ __('Logout') }}
        </a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>
         <div class="collapse navbar-collapse" id="navbarSupportedContent">
        </div>
      </nav>
