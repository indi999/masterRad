var swiper = new Swiper('.swiper-container',{
    autoplay: {
        delay: 10000,
        disableOnInteraction: false,
    },
});

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


    /* screen 1 */
     $(".screen-1 .dropdown-menu li a").on('click', function() {
        $(this).parents(".dropdown").find('.btn').html($(this).text());
        $(this).parents(".dropdown").find('.btn').val($(this).data('value'));

        let itemValue = $(this).parents(".dropdown").find('.btn').text();

        let itemNameI = $(this).parent().parent().parent().parent().parent().parent().parent().find('tbody.isporuka');
        let itemNameDP = $(this).parent().parent().parent().parent().parent().parent().parent().find('tbody.dizajn');
        let itemNameAdd = $(this).parent().parent().parent().parent().parent().parent().parent().find('tbody.dorada');
        let itemNameP = $(this).parent().parent().parent().parent().parent().parent().parent().find('tbody.produkcija');


        if(itemValue == 'Dorada') {
            localStorage.setItem("dorada-sc-1", 'active');
            localStorage.removeItem("isporuka-sc-1", 'active');
            localStorage.removeItem("dizajn-sc-1", 'active');
            localStorage.removeItem("produkcija-sc-1", 'active');

            itemNameAdd.removeClass('hide').addClass('open');
            itemNameDP.addClass('hide');
            itemNameP.addClass('hide');
            itemNameI.addClass('hide');
        }


        if(itemValue == 'Isporuka') {
            localStorage.setItem("isporuka-sc-1", 'active');
            localStorage.removeItem("dorada-sc-1", 'active');
            localStorage.removeItem("dizajn-sc-1", 'active');
            localStorage.removeItem("produkcija-sc-1", 'active');

             itemNameI.removeClass('hide').addClass('open');
             itemNameDP.addClass('hide');
             itemNameP.addClass('hide');
             itemNameAdd.addClass('hide');
        }

        if(itemValue == 'Dizajn/Priprema') {
            localStorage.setItem("dizajn-sc-1", 'active');
            localStorage.removeItem("isporuka-sc-1", 'active');
            localStorage.removeItem("dorada-sc-1", 'active');
            localStorage.removeItem("produkcija-sc-1", 'active');

             itemNameDP.removeClass('hide').addClass('open');
             itemNameI.addClass('hide');
             itemNameP.addClass('hide');
             itemNameAdd.addClass('hide');
        }


        if(itemValue == 'Produkcija') {

            localStorage.setItem("produkcija-sc-1", 'active');
            localStorage.removeItem("isporuka-sc-1", 'active');
            localStorage.removeItem("dorada-sc-1", 'active');
            localStorage.removeItem("dizajn-sc-1", 'active');

             itemNameP.removeClass('hide').addClass('open');
             itemNameI.addClass('hide');
             itemNameDP.addClass('hide');
             itemNameAdd.addClass('hide');
        }

    });


/* check local storage screen 1*/
let delivery = $('.screen-1 table tbody.isporuka');
let design = $('.screen-1 table tbody.dizajn');
let addition = $('.screen-1 table tbody.dorada');
let production = $('.screen-1 table tbody.produkcija');
let nameSector = $('.screen-1 .dropdown .btn');


if (localStorage.getItem("dorada-sc-1")) {
    addition.removeClass('hide').addClass('open');
    design.addClass('hide');
    delivery.addClass('hide');
    production.addClass('hide');
    nameSector.text('Dorada');
}


if (localStorage.getItem("produkcija-sc-1")) {
    production.removeClass('hide').addClass('open');
    design.addClass('hide');
    delivery.addClass('hide');
    addition.addClass('hide');
     nameSector.text('Produkcija');
}

if (localStorage.getItem("isporuka-sc-1")) {
    delivery.removeClass('hide').addClass('open');
    design.addClass('hide');
    addition.addClass('hide');
    production.addClass('hide');
     nameSector.text('Isporuka');
}

if (localStorage.getItem("dizajn-sc-1")) {
    design.removeClass('hide').addClass('open');
    addition.addClass('hide');
    delivery.addClass('hide');
    production.addClass('hide');
     nameSector.text('Dizajn');
}


/* screen 2 */
 $(".screen-2 .dropdown-menu li a").on('click', function(){
        $(this).parents(".dropdown").find('.btn').html($(this).text());
        $(this).parents(".dropdown").find('.btn').val($(this).data('value'));

        let itemValue = $(this).parents(".dropdown").find('.btn').text();

        let itemNameI = $(this).parent().parent().parent().parent().parent().parent().parent().find('tbody.isporuka');
        let itemNameDP = $(this).parent().parent().parent().parent().parent().parent().parent().find('tbody.dizajn');
        let itemNameAdd = $(this).parent().parent().parent().parent().parent().parent().parent().find('tbody.dorada');
        let itemNameP = $(this).parent().parent().parent().parent().parent().parent().parent().find('tbody.produkcija');


        if(itemValue == 'Dorada') {
            localStorage.setItem("dorada-sc-2", 'active');
            localStorage.removeItem("isporuka-sc-2", 'active');
            localStorage.removeItem("dizajn-sc-2", 'active');
            localStorage.removeItem("produkcija-sc-2", 'active');

            itemNameAdd.removeClass('hide').addClass('open');
            itemNameDP.addClass('hide');
            itemNameP.addClass('hide');
            itemNameI.addClass('hide');
        }


        if(itemValue == 'Isporuka') {

            localStorage.setItem("isporuka-sc-2", 'active');
            localStorage.removeItem("dorada-sc-2", 'active');
            localStorage.removeItem("dizajn-sc-2", 'active');
            localStorage.removeItem("produkcija-sc-2", 'active');

             itemNameI.removeClass('hide').addClass('open');
             itemNameDP.addClass('hide');
             itemNameP.addClass('hide');
             itemNameAdd.addClass('hide');
        }

        if(itemValue == 'Dizajn/Priprema') {

            localStorage.setItem("dizajn-sc-2", 'active');
            localStorage.removeItem("isporuka-sc-2", 'active');
            localStorage.removeItem("dorada-sc-2", 'active');
            localStorage.removeItem("produkcija-sc-2", 'active');

             itemNameDP.removeClass('hide').addClass('open');
             itemNameI.addClass('hide');
             itemNameP.addClass('hide');
             itemNameAdd.addClass('hide');
        }


        if(itemValue == 'Produkcija') {

            localStorage.setItem("produkcija-sc-2", 'active');
            localStorage.removeItem("isporuka-sc-2", 'active');
            localStorage.removeItem("dorada-sc-2", 'active');
            localStorage.removeItem("dizajn-sc-2", 'active');

             itemNameP.removeClass('hide').addClass('open');
             itemNameI.addClass('hide');
             itemNameDP.addClass('hide');
             itemNameAdd.addClass('hide');
        }

    });

        /* check local storage */
        let delivery2 = $('.screen-2 table tbody.isporuka');
        let design2 = $('.screen-2 table tbody.dizajn');
        let addition2 = $('.screen-2 table tbody.dorada');
        let production2 = $('.screen-2 table tbody.produkcija');
        let nameSector2 = $('.screen-2 .dropdown .btn');



        if (localStorage.getItem("dorada-sc-2")) {
            addition2.removeClass('hide').addClass('open');
            design2.addClass('hide');
            delivery2.addClass('hide');
            production2.addClass('hide');
             nameSector2.text('Dorada');
        }


        if (localStorage.getItem("produkcija-sc-2")) {
            production2.removeClass('hide').addClass('open');
            design2.addClass('hide');
            delivery2.addClass('hide');
            addition2.addClass('hide');
            nameSector2.text('Produkcija');
        }

        if (localStorage.getItem("isporuka-sc-2")) {
            delivery2.removeClass('hide').addClass('open');
            design2.addClass('hide');
            addition2.addClass('hide');
            production2.addClass('hide');
            nameSector2.text('Isporuka');
        }

        if (localStorage.getItem("dizajn-sc-2")) {
            design2.removeClass('hide').addClass('open');
            addition2.addClass('hide');
            delivery2.addClass('hide');
            production2.addClass('hide');
            nameSector2.text('Dizajn');
        }


        $(".screen-1 .dropdown .fa, .screen-2 .dropdown .fa").on('click', function(e) {
            e.preventDefault();
            $(this).parent().find('.dropdown-menu').toggleClass('show');
        });


        if (window.location.href.indexOf("monitor") != -1) {
        setInterval(function() {
            window.location.reload();
        }, 30000);
    }

});


