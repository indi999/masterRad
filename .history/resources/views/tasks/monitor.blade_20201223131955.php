@extends('layouts.app')

@section('content')

      <main>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">



                    <div class="part-sectorTasks monitor-table screen-1">
                        <div class="d-header">
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
                        </div>


                        <div class="part-table">
                            <div class="d-grid t-head">
                                <div class="item">
                                    Broj naloga
                                </div>
                                <div class="item">
                                    Brend
                                </div>

                                <div class="item">
                                    Opis posla
                                </div>
                                <div class="item">
                                    Planirani završetak
                                </div>
                            </div>


                            <div class="swiper-container slider-screen-1">
                                <div class="swiper-wrapper">
                                    @if($tasks->count()>0)
                                        <div class="swiper-slide">
                                            <?php $count = 0;?>
                                                @foreach($tasks as $task)
                                                    @foreach($task->departments as $department)

                                                        @if($department->name == "DIZAJN/PRIPREMA" && $department->pivot->is_active)
                                                            <div class="d-grid dizajn">
                                                                <div class="item">
                                                                    {{$task->number}}
                                                                </div>
                                                                <div class="item">
                                                                    {{$task->brand}}
                                                                </div>
                                                                <div class="item">
                                                                    {{$task->desc}}
                                                                </div>
                                                                <div class="item">
                                                                    {{ date('d M,Y', strtotime($task->date_end)) }}- {{ date('H:i:s', strtotime($task->time_end)) }}
                                                                </div>
                                                            </div>

                                                            @if($count % 2 == 0)
                                                                </div> <div class="swiper-slide">
                                                            @endif


                                                        @endif

                                                    @endforeach
                                                <?php $count++;?>
                                            @endforeach
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
@endsection
