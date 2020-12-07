<h1>JOBS  Sektor:{{ auth()->user()->department->name}} / ROLE: {{ auth()->user()->role}}</h1>

@if($tasks->count()>0)
@foreach($tasks as $task)
    @foreach($task->departments as $department)
        @if($department->name == auth()->user()->department->name)
            <ul>
                <li>{{$task->number}}</li>
                <li>{{$department->name}}</li>
                <li>{{$task->brand}}</li>
                <li>{{$department->pivot->status}}</li>
            </ul>
        @endif
    @endforeach

@endforeach
@endif

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="part-table admin-table">
                <div class="table-responsive  table-striped table-bordered">
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
                            <tr>
                                <th scope="row">2233</th>
                                <td>Scholl</td>
                                <td>Multi Brand Polica</td>
                                <td>31.12.2020</td>
                                <td>31.12.2020</td>
                                <td class="status">
                                    <form action="">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                                            <label class="form-check-label" for="defaultCheck1">
                                              Završeno
                                            </label>
                                          </div>
                                          <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                                            <label class="form-check-label" for="defaultCheck1">
                                              Kasni
                                            </label>
                                          </div>
                                    </form>
                                </td>
                            </tr>
                      </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


