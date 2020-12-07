<?php
// user or manager template
?>
@if(Auth::guard('web')->check())
    <p class="text-success">
      Ulogovani ste kao <strong>USER!</strong>
    </p>
@else
    <p class="text-danger">
        Izlogovani ste kao <strong>Korisnik!</strong>
    </p>
@endif


@if(Auth::guard('admin')->check())


    <p class="text-success">
     Ulogovani ste kao <strong>Admin!</strong>
    </p>
@else
    <p class="text-danger">
        Izlogovani ste kao <strong>Admin!</strong>
    </p>
@endif


//{{ Auth::guard('admin')->check() }}

