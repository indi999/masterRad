@extends('admins.layouts.master')
@section('content')

<main>
    <div class="part-table justify-content-center">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">

                    <div class="table-responsive  table-striped table-bordered">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">Radni Nalog Broj: #{{$job->number}}</th>
                                <th class="delete-user">
                                    <a href="{{route("admin.jobs.edit", ['job' => $job->id])}}" class="btn del-job">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                </th>
                                <th class="delete-user">
                                    <button type="submit" class="btn del-job" id="{{ $job->id }}" data-toggle="modal" data-target="#exampleModal-{{ $job->id }}">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </th>

                            </tr>
                            </thead>
                            <tbody>

                            <tr>
                                <td>
                                    <div class="jumbotron">
                                        <p class="lead">Opis posla: </p>
                                        <hr class="my-4">
                                        <p class="my-4 ">{{$job->desc}}</p>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Prilozi: PDF,WORD,CSV</td>
                            </tr>
                            <tr>
                                <td>Manager: {{$job->number}}</td>
                            </tr>
                            <tr>
                                <td>Brend: {{$job->brand}}</td>
                            </tr>
                            <tr>
                                <td>Klijent: {{$job->client}}</td>
                            </tr>
                            <tr>
                                <td>Prodaja: {{$job->saller->firstname}} {{$job->saller->lastname}}</td>
                            </tr>

                            <div class="b-example-divider"></div>

                            <tr>
                                <td>
                                    <div class="form-group row sectors">
                                        <label for="inputSectors" class="col-sm-4 col-form-label">Odgovorni sektori</label>
                                        <div class="col-sm-8">
                                            @foreach($job->departments as $department)
                                                @if($department->pivot->is_active == true)
                                                <div class="form-check">
                                                    <input class="form-check-input"  type="checkbox" value="{{$department->id}}" id="inputSectorsD"
                                                           checked="checked" disabled>
                                                    <label class="form-check-label" for="inputSectorsD">
                                                        {{$department->name}}
                                                    </label>
                                                </div>
                                                @endif
                                            @endforeach
                                        </div>
                                    </div>
                                </td>
                            </tr>

                            <tr>
                                <td scope="row">Rok za realizaciju naloga: {{ date('Y-m-d', strtotime($job->date_end)) }}
                                    <i class="fa fa-calendar" aria-hidden="true"></i>
                                </td>
                            </tr>
                            <tr>
                                <td class="complete-task">
                                    <label for="inputSectors" class="col-sm-4 col-form-label">Status poslovnog naloga: </label>


                                    <div class="d-flex gap-5 justify-content-center">

                                        <div class="list-group mx-0 w-auto">
                                            <label class="list-group-item d-flex gap-2">

                                                <form method="POST" action="/jobs/{{$department->pivot->id}}/finish">
                                                    @method('PATCH')
                                                    @csrf

                                                    <div class="form-check">
                                                        <input class="form-check-input flex-shrink-0" type="checkbox" name="is_finish" id="group1"
                                                               onChange="this.form.submit()" {{ $department->pivot->is_finish ? 'checked' : '' }}>
                                                        <label class="form-check-label" for="group1">
                                                        <span>
                                                        U izradi
                                                            <small class="d-block small opacity-50">Kliknuti pre pocetka realizacije poslovnog naloga..</small>
                                                        </span>
                                                        </label>
                                                    </div>
                                                </form>
                                        </div>
                                        <div class="list-group mx-0 w-auto">
                                            <label class="list-group-item d-flex gap-2">

                                            <form method="POST" action="/jobs/{{$department->pivot->id}}/finish">
                                                @method('PATCH')
                                                @csrf

                                                <div class="form-check">
                                                    <input class="form-check-input flex-shrink-0" type="checkbox" name="is_finish" id="group1"
                                                           onChange="this.form.submit()" {{ $department->pivot->is_finish ? 'checked' : '' }}>
                                                    <label class="form-check-label" for="group1">
                                                        <span>
                                                        Završeno
                                                            <small class="d-block small opacity-50">Cekirati u slucaju zavrsenog naloga.</small>
                                                        </span>
                                                    </label>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="list-group mx-0 w-auto">
                                            <label class="list-group-item d-flex gap-2">

                                            <form method="POST" action="/jobs/{{$department->pivot->id}}/late">
                                                @method('PATCH')
                                                @csrf

                                                <div class="form-check">
                                                    <input class="form-check-input flex-shrink-0" type="checkbox" name="is_late" id="defaultCheck1"
                                                           onChange="this.form.submit()" {{ $department->pivot->is_late ? 'checked' : '' }}>
                                                    <span>
                                                        Kasni
                                                        <small class="d-block text-muted">Cekirati u slucaju da nalog kasni.</small>
                                                    </span>
                                                </div>
                                            </form>

                                        </div>
                                    </div>

                                </td>
                            </tr>
                            <!-- Comment -->
                            <tr>
                                <td scope="row">
                                    @include('admins.tasks.comments')
                                </td>
                            </tr>

                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>
</main>

@endsection
