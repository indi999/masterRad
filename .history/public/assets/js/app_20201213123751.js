$(document).ready(function(){
    let now = Date.now();
    $('[data-toggle="datepicker"]').datepicker({
         startDate:now,
         autoHide: true
     });

     $('#timePicker').timepicker();

     $('.menu-items .add-job a').on('click', function(e) {
            e.preventDefault();
            $('.job-details form').toggleClass('open-form');
     });

     $('.menu-items .managers a').on('click', function(e) {
        e.preventDefault();
        $('.add-manager').toggleClass('open-form');
    });


    $('.menu-items .users a').on('click', function(e) {
        e.preventDefault();
        $('.add-user').toggleClass('open-form');
    });





    $(".job-details input[type='checkbox']").each(function () {

        let item= $(this);
        let selected =[];
        let itemValue= $(this).val();



         if($(this).is(":checked")) {
            console.log('checked')
        }

    });

   $('input[type="checkbox"]').click(function(){
        if($(this).is(":checked")){
            console.log('checked')
        }

    });










});
