<h3>Sector Create</h3>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="part-table admin-table">
                <div class="add-btn">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Dodaj sektor</button>
                </div>

                <div class="table-responsive  table-striped table-bordered">
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">id</th>
                            <th scope="col">Ime sektora</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td>Dizajn</td>
                            <td class="delete-user">
                                <a href="#">Obriši</a>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">2</th>
                            <td>Produkcija</td>
                            <td class="delete-user">
                                <a href="#">Obriši</a>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">3</th>
                            <td>Isporuka</td>
                            <td class="delete-user">
                                <a href="#">Obriši</a>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">4</th>
                            <td>Dorada</td>
                            <td class="delete-user">
                                <a href="#">Obriši</a>
                            </td>
                        </tr>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


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
                            <i class="fa fa-plus" aria-hidden="true"></i>Kreiraj sektor
                        </div>
                        <form action="" method="">
                            <div class="form-group">
                                <input type="text" class="form-control" name="user_name" placeholder="Ime sektora">
                            </div>
                            <button type="submit" name="submit" class="btn btn-primary">Kreiraj sektor</button>
                        </form>

                    </div>
                </div>
            </div>

        </div>
    </div>
</div>



