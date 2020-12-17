@extends('layouts.app')

@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="part-table admin-table">
                <div class="table-responsive  table-striped table-bordered">

                    <!-- Succes message -->
                    @if(session('message'))
                        <div class="alert alert-danger">
                            {{session('message')}}
                        </div>
                    @endif
                <!-- Error message -->
                    @if(count($errors)>0)
                        @foreach($errors->all() as $error)
                            <div class="alert alert-danger">
                                {{$error}}
                            </div>
                        @endforeach
                    @endif

                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Broj naloga</th>
                                <th scope="col">Brend</th>
                                <th scope="col">Klijent</th>
                                <th scope="col">Prodaja</th>
                                <th scope="col">Opis posla</th>
                                <th scope="col">Planirani završetak</th>
                                <th scope="col">Očekivani završetak</th>
                                <th class="design" scope="col">Dizajn/priprema</th>
                                <th class="poduction" scope="col">Produkcija</th>
                                <th class="add" scope="col">Dorada</th>
                                <th class="delivery" scope="col">Isporuka</th>
                                <th style="color#0d1e31" scope="col"></th>
                                <th class="" scope="col">Status projekta</th>
                            </tr>
                        </thead>

                         <tbody>
                            <!-- ARHIVA JOBS -->
                            @if($tasks->count()>0)
                                @foreach($tasks as $task)
                                    @php  $late=[]; $late=[]; @endphp
                                    <tr>
                                        <th scope="row">{{$task->number}}</th>
                                        <td scope="row">{{$task->brand}}</td>
                                        <td scope="row">{{$task->client}}</td>
                                        <td scope="row">{{$task->sale}}</td>
                                        <td scope="row">{{$task->desc}}</td>
                                        <td scope="row">{{ date('d M,Y', strtotime($task->date_end)) }} <i class="fa fa-calendar" aria-hidden="true"></i></td>
                                        @foreach($task->departments as $department)
                                            @php  $late[] = $department->pivot->is_late @endphp
                                            @php  $finish[] = $department->pivot->is_finish @endphp
                                        @endforeach

                                        @if(in_array(true, $late))
                                            <td scope="row" class="alert-job">{{ date('d M,Y', strtotime($task->expected_date_end)) }}
                                        @elseif(!in_array(false, $finish))
                                            <td scope="row" class="complete">{{ date('d M,Y', strtotime($task->expected_date_end)) }}
                                        @else
                                            <td scope="row">{{ date('d M,Y', strtotime($task->expected_date_end)) }}
                                                @endif
                                                <i class="fa fa-calendar changeDate" aria-hidden="true" id="{{$task->id}}" data-toggle="modal" data-target="#modalDate-{{$task->id}}"></i>
                                            </td>
                                        <!-- expected_date_end modal -->
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
                                                                <form action="{{ route('jobs.update', ['task' => $task->id]) }}" method="POST" class="new-date">
                                                                    @method('PATCH')
                                                                    @csrf

                                                                    <input type="text" class="form-control" name="expected_date_end" data-toggle="datepicker" placeholder="31.12.2020">
                                                                    <button type="submit" name="submit" class="btn btn-primary">Dodeli</button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        @foreach($task->departments as $department)
                                                @switch([$department->name, $department->pivot->is_active])
                                                    @case(['DIZAJN/PRIPREMA',true])
                                                    <td scope="row" class="active">
                                                        <i class="fa fa-calendar" aria-hidden="true"></i>

                                                        @php echo $department->pivot->is_finish ? date('d M,Y', strtotime($department->pivot->updated_at))."<i class='fa fa-check' aria-hidden='true'></i>" : "" @endphp
                                                        @php echo $department->pivot->is_late ? "<i class='fa fa-close' aria-hidden='true'></i>" : "" @endphp
                                                    </td>
                                                    @break
                                                    @case(['PRODUKCIJA',true])
                                                    <td scope="row" class="active">
                                                        <i class="fa fa-calendar" aria-hidden="true"></i>
                                                        @php echo $department->pivot->is_finish ? date('d M,Y', strtotime($department->pivot->updated_at)). "<i class='fa fa-check' aria-hidden='true'></i>" : "" @endphp
                                                        @php echo $department->pivot->is_late ? "<i class='fa fa-close' aria-hidden='true'></i>" : "" @endphp
                                                    </td>
                                                    @break
                                                    @case(['DORADA',true])
                                                    <td scope="row" class="active">
                                                        <i class="fa fa-calendar" aria-hidden="true"></i>
                                                        @php echo $department->pivot->is_finish ? date('d M,Y', strtotime($department->pivot->updated_at)) . "<i class='fa fa-check' aria-hidden='true'></i>" : "" @endphp
                                                        @php echo $department->pivot->is_late ? $department->pivot->updated_at."<i class='fa fa-close' aria-hidden='true'></i>" : "" @endphp
                                                    </td>
                                                    @break
                                                    @case(['ISPORUKA',true])
                                                    <td scope="row" class="active">
                                                        <i class="fa fa-calendar" aria-hidden="true"></i>
                                                        @php echo $department->pivot->is_finish ? date('d M,Y', strtotime($department->pivot->updated_at)). "<i class='fa fa-check' aria-hidden='true'></i>" : "" @endphp
                                                        @php echo $department->pivot->is_late ? "<i class='fa fa-close' aria-hidden='true'></i>" : "" @endphp
                                                    </td>
                                                    @break
                                                    @default
                                                    <td scope="row" class="inactive"></td>
                                                @endswitch
                                        @endforeach
                                        <td class="delete-user">
                                            <button type="submit" class="btn del-job" id="{{ $task->id }}" data-toggle="modal" data-target="#exampleModal-{{ $task->id }}">
                                                 <i class="fa fa-trash"></i>
                                            </button>
                                        </td>
                                        <td class="complete-task">
                                            <form method="POST" action="/jobs/{{$task->id}}/finishJob">
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
                                        </td>
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
                                                                <form action="{{ route('jobs.destroy', ['task' => $task->id] )}}" method="post">
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
                                    </tr>
                                @endforeach
                            @endif

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

