@guest
    <!-- if not auth - admin // some message -->
@else

    @include('admins.layouts.header')

    <!-- Navbar ----------------------------------------------------------------------->
    @include('admins.layouts.navigation')

        <!-- Content -->
        @yield('content')

    @include('admins.layouts.footer')

@endguest
