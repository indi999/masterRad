<footer>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
        <script type="text/javascript" src="js/datePicker.js"></script>
        <script type="text/javascript" src="js/timePicker.js"></script>
        <script type="text/javascript" src="js/app.js"></script>
     </footer>


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

  </body>
  </html>
