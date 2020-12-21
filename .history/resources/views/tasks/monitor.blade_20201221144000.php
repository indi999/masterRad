@extends('layouts.app')

@section('content')

      <main>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="swiper-container">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <!-- Screen 1 -->
                                <div class="part-table admin-table monitor-table screen-1">
                                    <div class="table-responsive  table-striped table-bordered">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th scope="col" colspan="12" class="d-header">
                                                        <div class="dropdown">
                                                            <i class="fa fa-angle-down" aria-hidden="true" data-bs-toggle="dropdown" aria-expanded="false"></i>
                                                            <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown"
                                                                aria-expanded="false">
                                                            </a>
                                                              <a class="link-logout" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"> {{ __('Logout') }}
                                                                </a>
                                                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                                    @csrf
                                                                </form>

                                                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                                <li><a class="dropdown-item btn-design" href="#">Dizajn/Priprema</a></li>
                                                                <li><a class="dropdown-item btn-prod" href="#">Produkcija</a></li>
                                                                <li><a class="dropdown-item btn-add" href="#">Dorada</a></li>
                                                                <li><a class="dropdown-item btn-delivery" href="#">Isporuka</a></li>
                                                            </ul>
                                                        </div>
                                                    </th>
                                                </tr>
                                                <tr>
                                                    <th scope="col">Broj naloga</th>
                                                    <th scope="col">Brend</th>
                                                    <th scope="col">Klijent</th>
                                                    <th scope="col">Prodaja</th>
                                                    <th scope="col">Opis posla</th>
                                                    <th scope="col">Planirani završetak</th>
                                                </tr>
                                            </thead>
                                            <tbody class="dizajn open">
                                                <tr>
                                                    <td>123</td>
                                                    <td>Dizajn</td>
                                                    <td>joe@gmail.com</td>
                                                    <td>Marjan S.</td>
                                                    <td>Counter Display</td>
                                                    <td>31.12.2020 </td>
                                                </tr>
                                                <tr>
                                                    <td>123</td>
                                                    <td>Dizajn</td>
                                                    <td>joe@gmail.com</td>
                                                    <td>Marjan S.</td>
                                                    <td>Counter Display</td>
                                                    <td>31.12.2020 </td>
                                                </tr>
                                                <tr>
                                                    <td>123</td>
                                                    <td>Dizajn</td>
                                                    <td>joe@gmail.com</td>
                                                    <td>Marjan S.</td>
                                                    <td>Counter Display</td>
                                                    <td>31.12.2020 </td>
                                                </tr>
                                            </tbody>

                                            <tbody class="produkcija">
                                                <tr>
                                                    <td>123</td>
                                                    <td>Produkcija</td>
                                                    <td>joe@gmail.com</td>
                                                    <td>Marjan S.</td>
                                                    <td>Counter Display</td>
                                                    <td>31.12.2020 </td>
                                                </tr>
                                                <tr>
                                                    <td>123</td>
                                                    <td>Produkcija</td>
                                                    <td>joe@gmail.com</td>
                                                    <td>Marjan S.</td>
                                                    <td>Counter Display</td>
                                                    <td>31.12.2020 </td>
                                                </tr>
                                                <tr>
                                                    <td>123</td>
                                                    <td>Produkcija</td>
                                                    <td>joe@gmail.com</td>
                                                    <td>Marjan S.</td>
                                                    <td>Counter Display</td>
                                                    <td>31.12.2020 </td>
                                                </tr>


                                            </tbody>

                                            <tbody class="dorada">
                                                <tr>
                                                    <td>123</td>
                                                    <td>Dorada</td>
                                                    <td>joe@gmail.com</td>
                                                    <td>Marjan S.</td>
                                                    <td>Counter Display</td>
                                                    <td>31.12.2020 </td>
                                                </tr>
                                                <tr>
                                                    <td>123</td>
                                                    <td>Dorada</td>
                                                    <td>joe@gmail.com</td>
                                                    <td>Marjan S.</td>
                                                    <td>Counter Display</td>
                                                    <td>31.12.2020 </td>
                                                </tr>
                                                <tr>
                                                    <td>123</td>
                                                    <td>Dorada</td>
                                                    <td>joe@gmail.com</td>
                                                    <td>Marjan S.</td>
                                                    <td>Counter Display</td>
                                                    <td>31.12.2020 </td>
                                                </tr>
                                            </tbody>
                                            <tbody class="isporuka">
                                                <tr>
                                                    <td>123</td>
                                                    <td>Isporuka</td>
                                                    <td>joe@gmail.com</td>
                                                    <td>Marjan S.</td>
                                                    <td>Counter Display</td>
                                                    <td>31.12.2020 </td>
                                                </tr>
                                                <tr>
                                                    <td>123</td>
                                                    <td>Isporuka</td>
                                                    <td>joe@gmail.com</td>
                                                    <td>Marjan S.</td>
                                                    <td>Counter Display</td>
                                                    <td>31.12.2020 </td>
                                                </tr>
                                                <tr>
                                                    <td>123</td>
                                                    <td>Isporuka</td>
                                                    <td>joe@gmail.com</td>
                                                    <td>Marjan S.</td>
                                                    <td>Counter Display</td>
                                                    <td>31.12.2020 </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <!-- Screen 2-->
                                <div class="part-table admin-table monitor-table screen-2">
                                    <div class="table-responsive  table-striped table-bordered">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th scope="col" colspan="12" class="d-header">
                                                        <div class="dropdown">
                                                            <i class="fa fa-angle-down" aria-hidden="true" data-bs-toggle="dropdown" aria-expanded="false"></i>
                                                            <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown"
                                                                aria-expanded="false">

                                                            </a>
                                                             <a class="link-logout" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"> {{ __('Logout') }}
                                                                </a>
                                                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                                    @csrf
                                                                </form>

                                                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                                <li><a class="dropdown-item btn-design" href="#">Dizajn/Priprema</a></li>
                                                                <li><a class="dropdown-item btn-prod" href="#">Produkcija</a></li>
                                                                <li><a class="dropdown-item btn-add" href="#">Dorada</a></li>
                                                                <li><a class="dropdown-item btn-delivery" href="#">Isporuka</a></li>
                                                            </ul>
                                                        </div>
                                                    </th>
                                                </tr>
                                                <tr>
                                                    <th scope="col">Broj naloga</th>
                                                    <th scope="col">Brend</th>
                                                    <th scope="col">Klijent</th>
                                                    <th scope="col">Prodaja</th>
                                                    <th scope="col">Opis posla</th>
                                                    <th scope="col">Planirani završetak</th>
                                                </tr>
                                            </thead>
                                            <tbody class="dizajn open">
                                                <tr>
                                                    <td>123</td>
                                                    <td>Dizajn</td>
                                                    <td>joe@gmail.com</td>
                                                    <td>Marjan S.</td>
                                                    <td>Counter Display</td>
                                                    <td>31.12.2020 </td>
                                                </tr>
                                                <tr>
                                                    <td>123</td>
                                                    <td>Dizajn</td>
                                                    <td>joe@gmail.com</td>
                                                    <td>Marjan S.</td>
                                                    <td>Counter Display</td>
                                                    <td>31.12.2020 </td>
                                                </tr>
                                                <tr>
                                                    <td>123</td>
                                                    <td>Dizajn</td>
                                                    <td>joe@gmail.com</td>
                                                    <td>Marjan S.</td>
                                                    <td>Counter Display</td>
                                                    <td>31.12.2020 </td>
                                                </tr>
                                            </tbody>

                                            <tbody class="produkcija">
                                                <tr>
                                                    <td>123</td>
                                                    <td>Produkcija</td>
                                                    <td>joe@gmail.com</td>
                                                    <td>Marjan S.</td>
                                                    <td>Counter Display</td>
                                                    <td>31.12.2020 </td>
                                                </tr>
                                                <tr>
                                                    <td>123</td>
                                                    <td>Produkcija</td>
                                                    <td>joe@gmail.com</td>
                                                    <td>Marjan S.</td>
                                                    <td>Counter Display</td>
                                                    <td>31.12.2020 </td>
                                                </tr>
                                                <tr>
                                                    <td>123</td>
                                                    <td>Produkcija</td>
                                                    <td>joe@gmail.com</td>
                                                    <td>Marjan S.</td>
                                                    <td>Counter Display</td>
                                                    <td>31.12.2020 </td>
                                                </tr>


                                            </tbody>

                                            <tbody class="dorada">
                                                <tr>
                                                    <td>123</td>
                                                    <td>Dorada</td>
                                                    <td>joe@gmail.com</td>
                                                    <td>Marjan S.</td>
                                                    <td>Counter Display</td>
                                                    <td>31.12.2020 </td>
                                                </tr>
                                                <tr>
                                                    <td>123</td>
                                                    <td>Dorada</td>
                                                    <td>joe@gmail.com</td>
                                                    <td>Marjan S.</td>
                                                    <td>Counter Display</td>
                                                    <td>31.12.2020 </td>
                                                </tr>
                                                <tr>
                                                    <td>123</td>
                                                    <td>Dorada</td>
                                                    <td>joe@gmail.com</td>
                                                    <td>Marjan S.</td>
                                                    <td>Counter Display</td>
                                                    <td>31.12.2020 </td>
                                                </tr>
                                            </tbody>
                                            <tbody class="isporuka">
                                                <tr>
                                                    <td>123</td>
                                                    <td>Isporuka</td>
                                                    <td>joe@gmail.com</td>
                                                    <td>Marjan S.</td>
                                                    <td>Counter Display</td>
                                                    <td>31.12.2020 </td>
                                                </tr>
                                                <tr>
                                                    <td>123</td>
                                                    <td>Isporuka</td>
                                                    <td>joe@gmail.com</td>
                                                    <td>Marjan S.</td>
                                                    <td>Counter Display</td>
                                                    <td>31.12.2020 </td>
                                                </tr>
                                                <tr>
                                                    <td>123</td>
                                                    <td>Isporuka</td>
                                                    <td>joe@gmail.com</td>
                                                    <td>Marjan S.</td>
                                                    <td>Counter Display</td>
                                                    <td>31.12.2020 </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </main>
@endsection
