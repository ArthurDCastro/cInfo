$(document).ready(function(){
    $('.ui.dropdown').dropdown();
    $('.botao').click( function () {
            $('.ui.labeled.icon.sidebar')
                .sidebar('toggle')
        }
    );
});