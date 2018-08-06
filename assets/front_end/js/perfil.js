$(document).ready(function() {
    $('.blurring.dimmable.image').dimmer({
        on: 'hover'
    });

    $('#fileinfo').hide();

    $('#input_foto').click(function () {
        $('#fileToUpload').trigger('click');
    });

    $('#fileToUpload').change(function () {
        $('#submit').trigger('click');
    });

    $('#user').hide();

    $('#relacao').click(function () {
        $.post('app/controller/perfil.php',
            {
                acao: 'relacao',
                user: $('#user').text()
            }, function (relacao) {
                if (relacao){
                    $('#relacao').removeClass('basic');
                    $('#relacao').text('Seguindo');
                } else {
                    $(this).removeClass('basic');
                    $(this).addClass('basic');
                    $(this).text('Seguir')
                }
            });
    });

    $('#perfil').click(function () {
        $('.item').removeClass('active');

        $('#perfil').addClass('active');

        $.post('app/controller/perfil.php',
            {
                acao: 'perfil',
                user: $('#user').text()
            }, function (dados) {
                $('#conteudo').html(dados);
            }
        );
    });

    $('#graficos').click(function () {
        $('.item').removeClass('active');

        $('#graficos').addClass('active');

        $.post('app/controller/perfil.php',
            {
                acao: 'graficos',
                user: $('#user').text()
            }, function (dados) {
                $('#conteudo').html(dados);
            }
        );
    });

    $('#seguidores').click(function () {
        $('.item').removeClass('active');

        $('#seguidores').addClass('active');

        $.post('app/controller/perfil.php',
            {
                acao: 'seguidores',
                user: $('#user').text()
            }, function (dados) {
                $('#conteudo').html(dados);
            }
        );
    });

    $('#seguindo').click(function () {
        $('.item').removeClass('active');

        $('#seguindo').addClass('active');
        $.post('app/controller/perfil.php',
            {
                acao: 'seguindo',
                user: $('#user').text()
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
                acao: 'editar',
                user: $('#user').text()
            }, function (dados) {
                $('#conteudo').html(dados);
            }
        );
    });

    $('.individual').click(function () {

        $.post('app/controller/perfil.php',
            {
                acao: 'individual',
                id: $(this).parent().attr('id'),
                user: $('#user').attr('id')
            }, function (dados) {
                $('#conteudo').html(dados);
            }
        );
    });
});