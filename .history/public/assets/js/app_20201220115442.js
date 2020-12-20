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

    let hiddenValue = $(".job-details input[type='hidden'][name='sectorItems']")
    $(".job-details input[type='checkbox']").click(function(){
        var favorite = [];
        $.each($("input:checked"), function(){
            favorite.push($(this).val());
        });

        hiddenValue.val(JSON.stringify(favorite))

        console.log(favorite)
    });


    $('.table tr .form-check input.unique').each(function() {
            $(this).on('touchstart click', function() {
            $('input.unique').not(this).removeAttr('checked');
        });
    });





});
