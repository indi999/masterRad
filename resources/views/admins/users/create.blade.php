
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

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
            <div class="modal-content">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <div class="modal-body">
                    <div class="container login createUser">
                         <div class="wrap-form">
                            <div class="form-header">
                                <i class="fa fa-plus" aria-hidden="true"></i>Kreiraj korisnika
                            </div>
                            <form action="{{route('admin.users.store')}}" method="post" >
                                @csrf

                                <div class="form-group">
                                    <input type="email" class="form-control" name="email" placeholder="Email">
                                </div>
                               
                                <div class="form-group">
                                    <input type="text" class="form-control"  name="password" placeholder="Šifra">
                                </div>

                                <div class="form-group">
                                    <select class="custom-select custom-select-lg mb-3" name="department_id">
                                        <option selected>Dodeli sektor</option>
                                        @foreach($departments as $department)
                                            <option value="{{$department->id}}">{{$department->name}}</option>
                                        @endforeach
                                        <option value="0">Svi</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <select class="custom-select custom-select-lg mb-3" name="role">
                                        <option selected>Dodeli rolu</option>
                                        <option value="manager">Menadžer</option>
                                        <option value="user">Korisnik</option>
                                        <option value="monitor">Monitor</option>
                                    </select>
                                </div>
                                <button type="submit" name="submit" class="btn btn-primary">Kreiraj korisnika</button>
                            </form>

                        </div>
                     </div>
                </div>

            </div>
            </div>
        </div>
