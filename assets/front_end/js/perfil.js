$(document).ready(function() {
    $('#perfil').click(function () {
        $('.item').removeClass('active');

        $('#perfil').addClass('active');

        $.post('app/controller/perfil.php',
            {
                acao: 'perfil'
            }, function (dados) {
                $('#conteudo').html(dados);
            }
        );
    });

    $('#graficos').click(function () {
        $('.item').removeClass('active');

        $('#graficos').toggleClass('active');

        $.post('app/controller/perfil.php',
            {
                acao: 'graficos'
            }, function (dados) {
                $('#conteudo').html(dados);
            }
        );
    });

    $('.excluir').click(function () {

        $.post('app/controller/perfil.php',
            {
                acao: 'excluir',
                id: $('#oculta').html()
            }, function (dados) {
                $('#conteudo').html(dados);
            }
        );
    });

    $('#seguidores').click(function () {
        $('.item').removeClass('active');

        $('#seguidores').toggleClass('active');

        $.post('app/controller/perfil.php',
            {
                acao: 'seguidores'
            }, function (dados) {
                $('#conteudo').html(dados);
            }
        );
    });

    $('#seguindo').click(function () {
        $('.item').removeClass('active');

        $('#seguindo').toggleClass('active');

        $.post('app/controller/perfil.php',
            {
                acao: 'seguindo'
            }, function (dados) {
                $('#conteudo').html(dados);
            }
        );
    });

    $('#editar').click(function () {
        $('.item').removeClass('active');

        $('#editar').toggleClass('active');

        $.post('app/controller/perfil.php',
            {
                acao: 'editar'
            }, function (dados) {
                $('#conteudo').html(dados);
            }
        );
    });
});