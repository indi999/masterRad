@extends('layouts.app')

@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="part-table admin-table">
                <div class="table-responsive  table-striped table-bordered">
                    <!-- Succes message -->
                    @include('messages.messages')

                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Broj naloga</th>
                                <th scope="col">Brend</th>
                                <th scope="col">Klijent</th>
                                <th scope="col">Prodaja</th>
                                <th scope="col">Planirani završetak</th>
                                <th scope="col">Očekivani završetak</th>
                                @foreach($sektors as $selectSector)
                                    <th class="design" scope="col">{{$selectSector->name}}</th>
                                @endforeach
                                @if(auth()->user()->role == 'manager')
                                    <th style="color#0d1e31" scope="col"></th>
                                    <th style="color#0d1e31" scope="col"></th>
                                @endif
                                <th class="" scope="col">Status projekta</th>
                            </tr>
                        </thead>
                        <tbody>
                        <!-- JOBS -->
                            @forelse($tasks as $task)
                            <tr>
                                <th scope="row"><a href="{{route('tasks.show', ['task'=>$task->id ])}}">{{$task->number}}</a></th>
                                <td scope="row">{{$task->brand}}</td>
                                <td scope="row">{{$task->client}}</td>
                                <td scope="row">
                                    {{$task->saller->firstname}} {{$task->saller->lastname}}
                                </td>
                                <td scope="row">{{ date('d M,Y', strtotime($task->date_end)) }}- {{ date('H:i:s', strtotime($task->time_end)) }}  <i class="fa fa-calendar" aria-hidden="true"></i></td>
                                <!-- create late, finish if array -->
                                @php
                                    $inProgress=[];
                                    $late=[];
                                    $finish=[];
                                    foreach($task->departments as $department){
                                        if($department->pivot->is_active){
                                            $late[] = $department->pivot->is_late;
                                            $finish[] = $department->pivot->is_finish;
                                        }
                                    }
                                @endphp
                                @if(!in_array(false, $finish))
                                    <td scope="row" class="complete">{{ date('d M,Y', strtotime($task->expected_date_end)) }}
                                @elseif(in_array(true, $late) || $task->expected_date_end > $task->date_end)
                                    <td scope="row" class="alert-job">{{ date('d M,Y', strtotime($task->expected_date_end)) }}
                                @elseif(in_array(true, $inProgress) || $task->expected_date_end > $task->date_end)
                                    <td scope="row" class="alert-job">{{ date('d M,Y', strtotime($task->expected_date_end)) }}
                                @else
                                    <td scope="row">{{ date('d M,Y', strtotime($task->expected_date_end)) }}
                                @endif
                                    <i class="fa fa-calendar changeDate" aria-hidden="true" id="{{$task->id}}" data-toggle="modal" data-target="#modalDate-{{$task->id}}"></i>
                                </td>
                                <!-- expected_date_end modal -->
                                @if(auth()->user()->role == 'manager')
                                    <div class="modal fade addNewDate" id="modalDate-{{$task->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                                <div class="modal-body">

                                                    <div class="form-header">
                                                        <i class="fa fa-plus" aria-hidden="true"></i> Dodeli novo vreme
                                                    </div>
                                                    <div class="container deleteUser createUser">
                                                        <div class="wrap-form">
                                                            <form action="{{ route('tasks.update', ['task' => $task->id]) }}" method="POST" class="new-date">
                                                                @method('PATCH')
                                                                @csrf

                                                                <input type="text" class="form-control" name="expected_date_end" data-toggle="datepicker" autocomplete="off" placeholder="31.12.2020">
                                                                <button type="submit" name="submit" class="btn btn-primary">Dodeli</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif

                                @include('tasks.departments')

                                @if(auth()->user()->role == 'manager')
                                    <td class="delete-user">
                                        <a href="{{route("tasks.edit", ['task' => $task->id])}}" class="btn del-job">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                    </td>
                                    <td class="delete-user">
                                        <button type="submit" class="btn del-job" id="{{ $task->id }}" data-toggle="modal" data-target="#exampleModal-{{ $task->id }}">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                        <!-- delete modal -->
                                        <div class="modal fade" id="exampleModal-{{ $task->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Da li si siguran da želiš da obrišeš posao?</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="container deleteUser createUser">
                                                            <div class="wrap-form">

                                                                <form action="{{ route('tasks.destroy', ['task' => $task->id] )}}" method="post">
                                                                    @method('delete')
                                                                    @csrf

                                                                    <button type="submit" class="btn btn-danger"> {{ __('Obriši') }}</button>
                                                                    <button type="submit" class="btn btn-primary" data-dismiss="modal" aria-label="Close">
                                                                        {{ __('Ne') }}
                                                                    </button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                @endif

                                <td class="complete-task">
                                @if(auth()->user()->role == 'manager')
                                <form method="POST" action="/tasks/{{$task->id}}/finishJob">
                                    @method('PATCH')
                                    @csrf

                                    <div class="form-check">
                                        <input class="form-check-input" name="finish" type="checkbox"  id="defaultCheck1"
                                               onChange="this.form.submit()" {{ $task->finish ? 'checked' : '' }}>
                                        <label class="form-check-label" for="defaultCheck1">
                                            Završeno
                                        </label>
                                    </div>
                                </form>
                                @else
                                    @if($task->finish)
                                      Završen
                                    @else
                                      U izradi
                                    @endif
                                @endif
                                </td>

                                @empty
                                <td>Nema zadatih poslova</td>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

