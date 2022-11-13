@extends('admins.layouts.master')

@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="part-table admin-table">
                @include('messages.messages')

                <div class="table-responsive  table-striped table-bordered">
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
                                <th style="color#0d1e31" scope="col"></th>
                                <th style="color#0d1e31" scope="col"></th>
                                <th class="" scope="col">Status projekta</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- JOBS -->
                            @forelse($jobs as $job)
                            <tr>
                                <th scope="row"><a href="{{ route('admin.jobs.show', ['job'=>$job->id ])}}">{{$job->number}}</a></th>
                                <td scope="row">{{$job->brand}}</td>
                                <td scope="row">{{$job->client}}</td>
                                <td scope="row">
                                    {{$job->saller->firstname}} {{$job->saller->lastname}}
                                </td>
                                <td scope="row">{{ date('Y-m-d', strtotime($job->date_end)) }} - {{ date('H:i:s', strtotime($job->time_end)) }} <i class="fa fa-calendar" aria-hidden="true"></i></td>
                                <!-- create late, finish if array -->
                                @php
                                    $late=[];
                                    $finish=[];
                                    foreach($job->departments as $department){
                                        if($department->pivot->is_active){
                                            $late[] = $department->pivot->is_late;
                                            $finish[] = $department->pivot->is_finish;
                                        }
                                    }
                                @endphp
                                @if(!in_array(false, $finish ?? ''))
                                    <td scope="row" class="complete">{{ date('d M,Y', strtotime($job->expected_date_end)) }}
                                @elseif(in_array(true, $late) || $job->expected_date_end > $job->date_end)
                                    <td scope="row" class="alert-job">{{ date('d M,Y', strtotime($job->expected_date_end)) }}
                                @else
                                    <td scope="row">{{ date('d M,Y', strtotime($job->expected_date_end)) }}
                                @endif
                                    <i class="fa fa-calendar changeDate" aria-hidden="true" id="{{$job->id}}" data-toggle="modal" data-target="#modalDate-{{$job->id}}"></i>
                                </td>
                                <!-- expected_date_end modal -->
                                <div class="modal fade addNewDate" id="modalDate-{{$job->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                                        <form action="{{ route('admin.jobs.updateExpectedDateEnd', ['job' => $job->id]) }}" method="POST" class="new-date">
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
                                @include('admins.tasks.departments')
                                <td class="delete-user">
                                    <a href="{{route("admin.jobs.edit", ['job' => $job->id])}}" class="btn del-job">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                </td>

                                <td class="delete-user">
                                    <button type="submit" class="btn del-job" id="{{ $job->id }}" data-toggle="modal" data-target="#exampleModal-{{ $job->id }}">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                    <!-- delete modal -->
                                    <div class="modal fade" id="exampleModal-{{ $job->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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

                                                            <form action="{{ route('admin.jobs.destroy', ['job' => $job->id] )}}" method="post">
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

                                <td class="complete-task">
                                    <form method="POST" action="admin/jobs/{{$department->pivot->id}}/in_progress">
                                        @method('PATCH')
                                        @csrf

                                        <div class="form-check">
                                            <input class="form-check-input" name="in_progress" type="checkbox"  id="defaultCheck1"
                                                   onChange="this.form.submit()" {{ $department->pivot->in_progress ? 'checked' : '' }}>
                                            <label class="form-check-label" for="defaultCheck1">
                                                U Izradi
                                            </label>
                                        </div>
                                    </form>
                                    <form method="POST" action="{{ route('admin.jobs.finishJob', ['job' => $job->id] )}}">
                                        @method('PATCH')
                                        @csrf

                                        <div class="form-check">
                                            <input class="form-check-input" name="finish" type="checkbox"  id="defaultCheck1"
                                                   onChange="this.form.submit()" {{ $job->finish ? 'checked' : '' }}>
                                            <label class="form-check-label" for="defaultCheck1">
                                                Završeno
                                            </label>
                                        </div>
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <tr>
                               <td>Nema zadatih poslova</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

