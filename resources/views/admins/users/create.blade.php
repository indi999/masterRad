
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
                                    <input type="text" class="form-control" name="firstname" placeholder="Ime" autocomplete="off">
                                     @error('firstname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <input type="text" class="form-control" name="lastname" placeholder="Prezime" autocomplete="off">
                                     @error('lastname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>


                                <div class="form-group">
                                    <input type="email" class="form-control" name="email" placeholder="Email" autocomplete="off">
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <div class="form-group ">
                                        <input type="text" class="form-control"  name="password" placeholder="Šifra" class="form-control @error('password') is-invalid @enderror" required autocomplete="new-password">
                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                             <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>

                                    <div class="form-group ">
                                        <input id="password-confirm" type="text" class="form-control"  name="password_confirmation" placeholder="Potvrda Šifre" name="password_confirmation" required autocomplete="new-password">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <select class="custom-select custom-select-lg mb-3" name="department_id">
                                        <option selected>Dodeli sektor</option>
                                        @foreach($departments as $department)
                                            <option value="{{$department->id}}">{{$department->name}}</option>
                                        @endforeach
                                        <option value="0">Svi</option>
                                    </select>
                                    @error('department_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <select class="custom-select custom-select-lg mb-3" name="role">
                                        <option selected>Dodeli rolu</option>
                                        <option value="manager">Menadžer</option>
                                        <option value="user">Korisnik</option>
                                        <option value="monitor">Monitor</option>
                                    </select>
                                    @error('role')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <button type="submit" name="submit" class="btn btn-primary">Kreiraj korisnika</button>
                            </form>

                        </div>
                     </div>
                </div>

            </div>
            </div>
        </div>

    <!-- modal monitor -->
    <div class="modal fade" id="exampleModalMonitor" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
            <div class="modal-content">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <div class="modal-body">
                    <div class="container login createUser">
                         <div class="wrap-form">
                            <div class="form-header">
                                <i class="fa fa-plus" aria-hidden="true"></i>Kreiraj monitor
                            </div>
                            <form action="" method="post" >
                                <div class="form-group">
                                    <input type="email" class="form-control" name="email" placeholder="Email" autocomplete="off">
                                </div>

                                <div class="form-group">
                                    <div class="form-group ">
                                        <input type="text" class="form-control"  name="password" placeholder="Šifra" class="form-control" required autocomplete="off">
                                    </div>

                                    <div class="form-group ">
                                        <input id="password-confirm" type="text" class="form-control"  name="password_confirmation" placeholder="Potvrda Šifre" name="password_confirmation" required autocomplete="off">
                                    </div>
                                </div>

                                <button type="submit" name="submit" class="btn btn-primary">Kreiraj monitor</button>
                            </form>

                        </div>
                     </div>
                </div>

            </div>
            </div>
        </div>