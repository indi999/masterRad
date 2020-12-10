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
                                <th scope="col">Klijent</th>
                                <th scope="col">Prodaja</th>
                                <th scope="col">Opis posla</th>
                                <th scope="col">Planirani završetak</th>
                                <th scope="col">Očekivani završetak</th>
                                <th class="design" scope="col">Dizajn/priprema</th>
                                <th class="poduction" scope="col">Produkcija</th>
                                <th class="add" scope="col">Dorada</th>
                                <th class="delivery" scope="col">Isporuka</th>
                            </tr>
                        </thead>

                         <tbody>
                            <!-- ARHIVA JOBS -->
                            @if($tasks->count()>0)
                                @foreach($tasks as $task)
                                    <tr>
                                        <th scope="row">{{$task->number}}</th>
                                        <td scope="row">{{$task->brand}}</td>
                                        <td scope="row">{{$task->client}}</td>
                                        <td scope="row">{{$task->sale}}</td>
                                        <td scope="row">{{$task->desc}}</td>
                                        <td scope="row">{{$task->date_end}} <i class="fa fa-calendar" aria-hidden="true"></i></td>
                                        <td scope="row">{{$task->expected_date_end}} <i class="fa fa-calendar" aria-hidden="true"></i></td>
                                        @foreach($task->departments as $department)
                                                @switch([$department->name, $department->pivot->is_active])
                                                    @case(['DIZAJN/PRIPREMA',true])
                                                        <td scope="row" class="active"><i class="fa fa-calendar" aria-hidden="true"></i></td>
                                                        @break
                                                    @case(['PRODUKCIJA',true])
                                                        <td scope="row" class="active"><i class="fa fa-calendar" aria-hidden="true"></i></td>
                                                        @break
                                                    @case(['DORADA',true])
                                                        <td scope="row" class="active"><i class="fa fa-calendar" aria-hidden="true"></i></td>
                                                        @break
                                                    @case(['ISPORUKA',true])
                                                      <td scope="row" class="active"><i class="fa fa-calendar" aria-hidden="true"></i></td>
                                                        @break
                                                    @default
                                                         <td scope="row" class="inactive"></td>
                                                @endswitch
                                        @endforeach
                                        <td class="delete-user">
                                            <a href="#">Obriši</a>
                                        </td>
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


<div class="modal fade" id="modalDate" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
        <div class="modal-content">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <div class="modal-body">
                <div class="container login createUser">
                     <div class="wrap-form">
                        <div class="form-header">
                            <i class="fa fa-plus" aria-hidden="true"></i>Dodeli novo vreme
                        </div>
                        <form action="" method="POST" class="new-date">
                            <input type="text" class="form-control" name="datePicker" data-toggle="datepicker" placeholder="31.12.2020">
                            <button type="submit" name="submit" class="btn btn-primary">Dodeli</button>
                        </form>

                    </div>
                 </div>
            </div>

        </div>
        </div>
    </div>
