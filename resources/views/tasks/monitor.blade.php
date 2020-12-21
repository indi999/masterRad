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

                                                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                                <li><a class="dropdown-item btn-design" href="#">Dizajn/Priprema</a></li>
                                                                <li><a class="dropdown-item btn-prod" href="#">Produkcija</a></li>
                                                                <li><a class="dropdown-item btn-add" href="#">Dorada</a></li>
                                                                <li><a class="dropdown-item btn-delivery" href="#">Isporuka</a></li>
                                                            </ul>

                                                             <a class="nav-logout" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"> {{ __('Logout') }}
                                                                </a>
                                                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                                    @csrf
                                                                </form>
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
                                            @if($tasks->count()>0)
                                                @foreach($tasks as $task)
                                                    @foreach($task->departments as $department)
                                                        @if($department->name == "DIZAJN/PRIPREMA") <!--&& $department->pivot->is_active)-->
                                                        <tr>
                                                            <td>{{$task->number}} </td>
                                                            <td>{{$task->brand}} </td>
                                                            <td>{{$task->client}} </td>
                                                            <td>{{$task->sale}} </td>
                                                            <td>{{$task->desc}} </td>
                                                            <td>{{ date('d M,Y', strtotime($task->date_end)) }}- {{ date('H:i:s', strtotime($task->time_end)) }} </td>
                                                        </tr>
                                                        @endif
                                                    @endforeach
                                                @endforeach
                                            @endif
                                            </tbody>

                                            <tbody class="produkcija">
                                            @if($tasks->count()>0)
                                                @foreach($tasks as $task)
                                                    @foreach($task->departments as $department)
                                                        @if($department->name == "PRODUKCIJA" && $department->pivot->is_active)
                                                            <tr>
                                                                <td>{{$task->number}} </td>
                                                                <td>{{$task->brand}} </td>
                                                                <td>{{$task->client}} </td>
                                                                <td>{{$task->sale}} </td>
                                                                <td>{{$task->desc}} </td>
                                                                <td>{{ date('d M,Y', strtotime($task->date_end)) }}- {{ date('H:i:s', strtotime($task->time_end)) }}  </td>
                                                            </tr>
                                                        @endif
                                                    @endforeach
                                                @endforeach
                                            @endif
                                            </tbody>

                                            <tbody class="dorada">
                                            @if($tasks->count()>0)
                                                @foreach($tasks as $task)
                                                    @foreach($task->departments as $department)
                                                        @if($department->name == "DORADA" && $department->pivot->is_active)
                                                            <tr>
                                                                <td>{{$task->number}} </td>
                                                                <td>{{$task->brand}} </td>
                                                                <td>{{$task->client}} </td>
                                                                <td>{{$task->sale}} </td>
                                                                <td>{{$task->desc}} </td>
                                                                <td>{{ date('d M,Y', strtotime($task->date_end)) }}- {{ date('H:i:s', strtotime($task->time_end)) }} </td>
                                                            </tr>
                                                        @endif
                                                    @endforeach
                                                @endforeach
                                            @endif
                                            </tbody>
                                            <tbody class="isporuka">
                                            @if($tasks->count()>0)
                                                @foreach($tasks as $task)
                                                    @foreach($task->departments as $department)
                                                        @if($department->name == "ISPORUKA" && $department->pivot->is_active)
                                                            <tr>
                                                                <td>{{$task->number}} </td>
                                                                <td>{{$task->brand}} </td>
                                                                <td>{{$task->client}} </td>
                                                                <td>{{$task->sale}} </td>
                                                                <td>{{$task->desc}} </td>
                                                                <td>{{ date('d M,Y', strtotime($task->date_end)) }}- {{ date('H:i:s', strtotime($task->time_end)) }} </td>
                                                            </tr>
                                                        @endif
                                                    @endforeach
                                                @endforeach
                                            @endif
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

                                                            <a class="nav-logout" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"> {{ __('Logout') }}
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

                                            @if($tasks->count()>0)
                                                @foreach($tasks as $task)
                                                    @foreach($task->departments as $department)
                                                        @if($department->name == "DIZAJN/PRIPREMA" && $department->pivot->is_active)
                                                            <tr>
                                                                <td>{{$task->number}} </td>
                                                                <td>{{$task->brand}} </td>
                                                                <td>{{$task->client}} </td>
                                                                <td>{{$task->sale}} </td>
                                                                <td>{{$task->desc}} </td>
                                                                <td>{{ date('d M,Y', strtotime($task->date_end)) }}- {{ date('H:i:s', strtotime($task->time_end)) }}  </td>
                                                            </tr>
                                                        @endif
                                                    @endforeach

                                                @endforeach
                                            @endif
                                            </tbody>

                                            <tbody class="produkcija">
                                                @if($tasks->count()>0)
                                                    @foreach($tasks as $task)
                                                        @foreach($task->departments as $department)
                                                            @if($department->name == "PRODUKCIJA" && $department->pivot->is_active)
                                                                <tr>
                                                                    <td>{{$task->number}} </td>
                                                                    <td>{{$task->brand}} </td>
                                                                    <td>{{$task->client}} </td>
                                                                    <td>{{$task->sale}} </td>
                                                                    <td>{{$task->desc}} </td>
                                                                    <td>{{ date('d M,Y', strtotime($task->date_end)) }}- {{ date('H:i:s', strtotime($task->time_end)) }}  </td>
                                                                </tr>
                                                            @endif
                                                        @endforeach
                                                    @endforeach
                                                @endif
                                            </tbody>

                                            <tbody class="dorada">
                                                @if($tasks->count()>0)
                                                    @foreach($tasks as $task)
                                                        @foreach($task->departments as $department)
                                                            @if($department->name == "DORADA" && $department->pivot->is_active)
                                                                <tr>
                                                                    <td>{{$task->number}} </td>
                                                                    <td>{{$task->brand}} </td>
                                                                    <td>{{$task->client}} </td>
                                                                    <td>{{$task->sale}} </td>
                                                                    <td>{{$task->desc}} </td>
                                                                    <td>{{ date('d M,Y', strtotime($task->date_end)) }}- {{ date('H:i:s', strtotime($task->time_end)) }}  </td>
                                                                </tr>
                                                            @endif
                                                        @endforeach
                                                    @endforeach
                                                @endif
                                            </tbody>
                                            <tbody class="isporuka">
                                                @if($tasks->count()>0)
                                                    @foreach($tasks as $task)
                                                        @foreach($task->departments as $department)
                                                            @if($department->name == "ISPORUKA" && $department->pivot->is_active)
                                                                <tr>
                                                                    <td>{{$task->number}} </td>
                                                                    <td>{{$task->brand}} </td>
                                                                    <td>{{$task->client}} </td>
                                                                    <td>{{$task->sale}} </td>
                                                                    <td>{{$task->desc}} </td>
                                                                    <td>{{ date('d M,Y', strtotime($task->date_end)) }}- {{ date('H:i:s', strtotime($task->time_end)) }}  </td>
                                                                </tr>
                                                            @endif
                                                        @endforeach
                                                    @endforeach
                                                @endif
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
