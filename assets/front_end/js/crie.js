$(document).ready(function() {
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
});