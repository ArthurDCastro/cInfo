$(document).ready(function() {

    $('.ui.form')
        .form({
            fields: {
                titulo: 'empty',
                tipo: 'empty',
                gasto: 'empty'
            }
        })
    ;

    $('.clear').click(function () {
        $('#grafico').remove();
    });

    $('select.dropdown')
        .dropdown()
    ;

    $('#funcao').change(function () {
        $.post('app/controller/crie.php',
            {
                acao: 'funcao',
                vals: $('#funcao').val()
            }, function (dados) {
                var dbParam = JSON.parse(dados);
                var txt = '';
                var list = [];

                for (x in dbParam) {
                    list = dbParam[x];
                    txt += '<option class="item" value="' + list[0] + '">' + list[1] + "</option>";
                }

                var classe = document.getElementsByClassName('gasto');
                for (y in classe){
                    classe[y].getElementsByTagName('select')[0].innerHTML = txt;
                }
            })
    });

    $('#salvar').click(function () {
        if( $('.ui.form').form('is valid')) {
            $.post('app/controller/crie.php',
                {
                    acao: 'salvar',
                    vals: {
                        dados: $('#gasto').val(),
                        titulo: $('#titulo').val(),
                        tipo: $('#tipo').val()

                    }
                }, function (dados) {

                })
        } else {
            $('.ui.form').form('validate form')
        }

    });
});