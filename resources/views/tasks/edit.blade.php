@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-7">
                @if ( auth()->user()->role == 'manager' )
                    @include('messages.messages')
                    <div class="menu-items">
                        <ul>
                            <li><a href="{{ route('home') }}"><i class="fa fa-list" aria-hidden="true"></i>Lista poslova</a></li>
                            <li><a href="{{ route('tasks.show', ['task' => $task->id])  }}"><i class="fa fa-tasks" aria-hidden="true"></i>Prikazi nalog br: #{{$task->number}}</a></li>
                            <li class="add-job"><a href="#"><i class="fa fa-plus" aria-hidden="false"></i>Izmeni podatke za posao br: #{{$task->number}}</a></li>
                        </ul>
                    </div>

                    <div class="job-details">
                        <form action="{{ route('tasks.update', ['task' => $task->id]) }}" method="POST">
                            @method('PATCH')
                            @csrf

                            <input type="hidden" name="sectorItems" value="[]">

                            <div class="form-group row">
                                <label for="inputJobId" class="col-sm-4 col-form-label">Br. Radnog naloga</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" value="{{$task->number}}" name="number" id="inputJobId" required autocomplete="off">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="inputBrand" class="col-sm-4 col-form-label">Brend</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" value="{{$task->brand}}" name="brand" id="inputBrand" required autocomplete="off">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="inputClient" class="col-sm-4 col-form-label">Klijent</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" value="{{$task->client}}" name="client" id="inputClient" required autocomplete="off">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="inputJobId" class="col-sm-4 col-form-label">Prodaja</label>
                                <div class="col-sm-8">
                                    <select class="custom-select custom-select-lg mb-3 form-control" value="{{$task->saller_id}}" name="saller_id">
                                        <option value="{{$attributes['sallerData']['sellerID']}}">{{$attributes['sallerData']['fullName']}}</option>
                                        @foreach($sellers as $seller) <!--$users-->
                                            <option value="{{$seller->id}}">{{$seller->firstname}} {{$seller->lastname}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="inputDesc" class="col-sm-4 col-form-label">Opis posla</label>
                                <div class="col-sm-8">
                                    <textarea class="form-control" name="desc" id="exampleFormControlTextarea1"
                                              rows="10" id="inputDesc" required autocomplete="off">{{$task->desc}}</textarea>
                                </div>
                            </div>

                            <div class="form-group row sectors">
                                <label for="inputSectors" class="col-sm-4 col-form-label">Sektori</label>
                                <div class="col-sm-8">
                                    @foreach($departments as $department)
                                        <div class="form-check">
                                            <input class="form-check-input"  type="checkbox" value="{{$department->id}}" id="inputSectorsD"
                                                   @foreach($task->departments as $setupDepartment)
                                                   @if($department->name == $setupDepartment->name && $setupDepartment->pivot->is_active == true)
                                                   checked="checked">
                                            @endif
                                            @endforeach
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
                                    <input type="text" class="form-control" value="{{$task->date_end}}" name="date_end" data-toggle="datepicker" placeholder="Datum"  autocomplete="off" required>
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
                        <a href=#><i class="fa fa-list" aria-hidden="true"></i>Lista korisnika</a>
                    </div>
                </div>
                @else

                @endif
            </div>
        </div>
    </div>
@endsection
