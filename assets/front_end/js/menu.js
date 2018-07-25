$(document).ready(function(){


    $('.user_option').hide();

    $('.ui.dropdown').dropdown();


    $('.botao').click( function () {
        $('.ui.labeled.icon.sidebar').sidebar('toggle');
    });


    $('.user_icon').click( function () {
        $('.padrao_option').hide();
        $('.user_option').show();
    });

    $('.voltar_icon').click( function () {
        $('.user_option').hide();
        $('.padrao_option').show();
    });

});
