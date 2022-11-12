@guest
    <!-- if not auth - admin // some message -->
@else
    @include('admins.layouts.header')
    <!-- Navbar ----------------------------------------------------------------------->
    @include('admins.layouts.navigation')
        <main>
             @yield('content')
        </main>
    @include('admins.layouts.footer')
@endguest
