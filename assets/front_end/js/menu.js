$(document).ready(function(){


    $('.user_option').hide();

    $('.ui.dropdown').dropdown();


    $('.botao').click( function () {
        $('.ui.labeled.icon.sidebar').sidebar('toggle');
    });


});
