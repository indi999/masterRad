const selectValue = document.getElementById('typeofReg');
if(selectValue) {
    const selectValue = document.getElementById('typeofReg');
    const dateBirth  =document.getElementById('dateBirth');
    if(selectValue.value == "Group") {
    dateBirth.style.display = "none";
    } else {
        dateBirth.style.display = "block";
    }
}


function val() {
    const selectValue = document.getElementById('typeofReg');
    const dateBirth  =document.getElementById('dateBirth');

    if(selectValue.value == "Group") {
    dateBirth.style.display = "none";
    } else {
        dateBirth.style.display = "block";
    }
}

$('.add-more').click(function(e){
    e.preventDefault();
    $('.dynamic-element').first().clone().appendTo('.dynamic-stuff').show();
    $(this).attr('id', counter)
    attach_delete();
  });

$('.delete').hide();
  function attach_delete() {
    $('.delete').show();
    $('.delete').off();
    $('.delete').click(function(){
      $(this).closest('.dynamic-element').remove();
    });
}


$('.attach-payment button').on('click', function(e){
    e.preventDefault();
});


$('#file-upload').change(function() {
    var file = $('#file-upload')[0].files[0].name;
    $(this).prev('label').text(file);
});




/*

const delButton= jQuery('.group-reg .table tr td .btn-del, .group-reg .form-group .btn-del');
delButton.on('click', function(){
     const btndata = jQuery(this).data('target');
     const btnID = jQuery(this).attr('id');
     const rmF = btndata.substring(1);
     const body = jQuery('body');
     const bodyID = body.find('.modal').attr('id', rmF);
     let formAction = jQuery('.modal').find('form').attr('action');
     let formUpdatedA =  formAction.slice(0, -1) + btnID;

     formAction = jQuery('.modal').find('form').attr('action', formUpdatedA)
     console.log(formUpdatedA);

});


$(function() {
    $('.custom-file-input').on('change', function() {
        let fileName = $(this).val().split('\\').pop();
        $(this).next('.custom-file-label').addClass("selected").html(fileName);
     });

});

*/
