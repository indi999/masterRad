<h3>Job Create Template</h3>

<form>
    <!-- select user -->

    <a href="{{ route('admin.jobs.index') }}">JOBS link</a>

    <!-- Add form for Add job -->
    <!-- submit -->
</form>



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
                            <form action="" method="">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="user_name" placeholder="Korisničko ime">
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control" name="user_email" placeholder="Email">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control"  name="user_pass" placeholder="Šifra">
                                </div>

                                <div class="form-group">
                                    <select class="custom-select custom-select-lg mb-3">
                                        <option selected>Dodeli sektor</option>
                                        <option value="1">Menadžer</option>
                                        <option value="3">Dizajn</option>
                                        <option value="2">Produkcija</option>
                                        <option value="3">Dorada</option>
                                        <option value="3">Isporuka</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <select class="custom-select custom-select-lg mb-3">
                                        <option selected>Dodeli rolu</option>
                                        <option value="1">Menadžer</option>
                                        <option value="2">Korisnik</option>
                                        <option value="3">Monitor</option>
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

