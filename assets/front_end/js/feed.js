$(document).ready(function(){

    $('.comentarios').click(function () {
        var id = $(this).attr('id');
        $('#comen-' + id)
            .nag('show')
    });

    $('.add_coment').click(function () {
        var id = $(this).attr('id').substring(4);
        var text = $('#text-' + id).val();

        $.post('app/controller/feed.php',
            {
                acao: 'comentar',
                vals: {
                    postagem: id,
                    comentario: text

                }
            }, function (dados) {
                $('#todos_comen-' + id).html(dados);
                $('#text-' + id).val("");
            })
    });

    $('.like-post').click(function () {
        var acao = $(this).attr('id').substring(0,2);

        if (acao == 'un'){
            var id = $(this).attr('id').replace('unlike-', '');
        } else if (acao == 'li'){
            var id = $(this).attr('id').replace('like-', '');
        }

        $.post('app/controller/feed.php',
            {
                acao: 'like-post',
                vals: {
                    postagem: id
                }
            }, function (dados) {
                var dado = JSON.parse(dados);
                if (dado['resposta'] == 'like'){
                    $('#like-' + id).html('<i class="like icon"></i>' + dado['count']);
                    $('#like-' + id).attr(
                        {
                            id: 'unlike-' + id,
                            class: "like active like-post"
                        });
                } else {
                    $('#unlike-' + id).html('<i class="like icon"></i>' + dado['count']);
                    $('#unlike-' + id).attr(
                        {
                            id: 'like-' + id,
                            class: "like like-post"
                        });

                }


            });
    });

    $('.like-coment').click(function () {
        var acao = $(this).attr('id').substring(0,2);

        if (acao == 'un'){
            var id = $(this).attr('id').replace('unlike-', '');
        } else if (acao == 'li'){
            var id = $(this).attr('id').replace('like-', '');
        }

        $.post('app/controller/feed.php',
            {
                acao: 'like-post',
                vals: {
                    postagem: id
                }
            }, function (dados) {
                var dado = JSON.parse(dados);
                if (dado['resposta'] == 'like'){
                    $('#like-' + id).html('<i class="like icon"></i>' + dado['count']);
                    $('#like-' + id).attr(
                        {
                            id: 'unlike-' + id,
                            class: "like active like-post"
                        });
                } else {
                    $('#unlike-' + id).html('<i class="like icon"></i>' + dado['count']);
                    $('#unlike-' + id).attr(
                        {
                            id: 'like-' + id,
                            class: "like like-post"
                        });

                }


            });
    });

});