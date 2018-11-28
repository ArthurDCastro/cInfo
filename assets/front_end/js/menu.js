$(document).ready(function(){


    $('.user_option').hide();

    $('.ui.dropdown').dropdown();


    $('.botao').click( function () {
        $('.ui.labeled.icon.sidebar').sidebar('toggle');
    });



    $('#search').keyup(function () {
        $.post('app/controller/search.php',
            {
                acao: 'user',
                vals: $('#search').val()
            }, function (data) {
                var dados = JSON.parse(data);
                var html = '';

                for (x in dados){
                    if (dados[x]['metodo'] === 'login'){
                        html += '<a href="perfil/' + dados[x]['login'] + '" class="item"><span class="text"><img class="ui avatar image" src="' + dados[x]['foto'] + '">' + dados[x]['login'] + '</span><br><span class="description">' + dados[x]['nome'] + '</span><br></a>';
                    } else {
                        html += '<a href="perfil/' + dados[x]['login'] + '" class="item"><span class="text"><img class="ui avatar image" src="' + dados[x]['foto'] + '">' + dados[x]['nome'] + '</span><br><span class="description">' + dados[x]['login'] + '</span><br></a>';
                    }
                }
                $('#text_search').html(html);
                $('.ui.dropdown').dropdown('show');
            }
        );
    })
    ;

});
