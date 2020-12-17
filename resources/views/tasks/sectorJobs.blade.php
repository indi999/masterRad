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
                            <th scope="col">Opis posla</th>
                            <th scope="col">Planirani završetak</th>
                            <th scope="col">Očekivani završetak</th>
                            <th scope="col">Status</th>
                            </tr>
                        </thead>
                        <tbody>

                            @if($tasks->count()>0)
                            @foreach($tasks as $task)
                                @foreach($task->departments as $department)
                                    @if($department->name == auth()->user()->department->name && $department->pivot->is_active)
                                    <!--<ul>
                                        <li>{{$task->number}}</li>
                                        <li>{{$department->name}}</li>
                                        <li>{{$task->brand}}</li>
                                        <li>{{$department->pivot->is_late}}</li>
                                        <li>{{$department->pivot->is_finish}}</li>
                                    </ul>-->

                                    <tr>
                                        <th scope="row">{{$task->number}}</th>
                                        <td>{{$task->brand}}</td>
                                        <td>{{$task->desc}}</td>
                                        <td>{{$task->date_end}}</td>
                                        <td>{{$task->expected_date_end}}</td>
                                        <td class="status">
                                            <form method="POST" action="/jobs/{{$department->pivot->id}}/finish">
                                                @method('PATCH')
                                                @csrf

                                                <div class="form-check">
                                                    <input class="form-check-input" name="is_finish" type="radio"  id="defaultCheck1"
                                                           onChange="this.form.submit()" {{ $department->pivot->is_finish ? 'checked' : '' }}>
                                                    <label class="form-check-label" for="defaultCheck1">
                                                    Završeno
                                                    </label>
                                                </div>
                                            </form>
                                            <form method="POST" action="/jobs/{{$department->pivot->id}}/late">
                                                @method('PATCH')
                                                @csrf

                                                <div class="form-check">
                                                    <input class="form-check-input" name="is_late" type="radio"  id="defaultCheck1"
                                                           onChange="this.form.submit()" {{ $department->pivot->is_late ? 'checked' : '' }}>
                                                    <label class="form-check-label" for="defaultCheck1">
                                                    Kasni
                                                    </label>
                                                </div>
                                            </form>
                                        </td>
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

@endsection


