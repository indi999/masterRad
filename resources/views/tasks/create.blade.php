@extends('layouts.app')

@section('content')
    <div class="container">
            <div class="row">
                <div class="col-7">

                    <!-- Succes message -->
                    @if(session('message'))
                        <div class="alert alert-danger">
                            {{session('message')}}
                        </div>
                    @endif
                <!-- Error message from app to git-->
                    @if(count($errors)>0)
                        @foreach($errors->all() as $error)
                            <div class="alert alert-danger">
                                {{$error}}
                            </div>
                        @endforeach
                    @endif

                    @if ( auth()->user()->role == 'manager')

                        <div class="menu-items">
                            <ul>
                                <li><a href="{{ route('home') }}"><i class="fa fa-list" aria-hidden="true"></i>Lista poslova</a></li>
                                <li class="add-job"><a href="#"><i class="fa fa-plus" aria-hidden="true"></i>Dodaj posao</a></li>
                            </ul>
                        </div>
                        <div class="job-details">
                            <form action="{{route('tasks.store')}}" method="post" class="">
                                @csrf

                                <input type="hidden" name="sectorItems" value="[]">

                                <div class="form-group row">
                                <label for="inputJobId" class="col-sm-4 col-form-label">Br. Radnog naloga</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="number" id="inputJobId" autocomplete="off" required>
                                </div>
                                </div>

                                <div class="form-group row">
                                    <label for="inputBrand" class="col-sm-4 col-form-label">Brend</label>
                                    <div class="col-sm-8">
                                    <input type="text" class="form-control" name="brand" id="inputBrand" autocomplete="off" required>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="inputClient" class="col-sm-4 col-form-label">Klijent</label>
                                    <div class="col-sm-8">
                                    <input type="text" class="form-control" name="client" id="inputClient" autocomplete="off" required>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="inputJobId" class="col-sm-4 col-form-label">Prodaja</label>
                                    <div class="col-sm-8">
                                        <select class="custom-select custom-select-lg mb-3 form-control" name="saller_id">
                                        @foreach($sellers as $seller) <!--$users-->
                                            <option value="{{$seller->id}}">{{$seller->firstname}} {{$seller->lastname}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="inputDesc" class="col-sm-4 col-form-label">Opis posla</label>
                                    <div class="col-sm-8">
                                    <input type="text" class="form-control" name="desc" id="inputDesc" autocomplete="off" required>
                                    </div>
                                </div>

                                <div class="form-group row sectors">
                                    <label for="inputSectors" class="col-sm-4 col-form-label">Sektori</label>
                                    <div class="col-sm-8">
                                        @foreach($departments as $department)
                                            <div class="form-check">
                                                <input class="form-check-input"  type="checkbox" value="{{$department->id}}" id="inputSectorsD" >
                                                <label class="form-check-label" for="inputSectorsD">
                                                    {{$department->name}}
                                                </label>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>

                                <div class="form-group row dateTime">
                                    <label for="inputDesc" class="col-sm-4 col-form-label">Rok za završetak</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" name="date_end" data-toggle="datepicker" placeholder="Datum" autocomplete="off" required>
                                        <input type="text" id="timePicker" class="form-control" name="time_end" data-toggle="timepicker" placeholder="Vreme" autocomplete="off" required>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-sm-12">
                                    <input type="submit" class="form-control" name="submit" value="Dodaj">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-5">
                    <div class="wrap-form add-user">
                        <div class="form-footer">
                            <a href="list-users-managerView.html"><i class="fa fa-list" aria-hidden="true"></i>Lista korisnika</a>
                        </div>
                    </div>
                    @else

                    @endif
                </div>
            </div>
        </div>
@endsection
