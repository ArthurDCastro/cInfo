$(document).ready(function(){

    $('.comentarios').click(function () {
        var id = $(this).attr('id');
        $('#comen-' + id)
            .nag('show')
    });

    $('.add_coment').click(function () {
        var id = $(this).attr('id').substring(4);
        var text = $('#text-' + id).val();

        alert(id);

        $.post('app/controller/feed.php',
            {
                acao: 'comentar',
                vals: {
                    postagem: id,
                    comentario: text

                }
            }, function (dados) {
                var dado = JSON.parse(dados);
                $('#salvo')
                    .modal('show')
                ;

                $('#id').val(dado['codigo']);
                $('#share').show();
            })
    });

});