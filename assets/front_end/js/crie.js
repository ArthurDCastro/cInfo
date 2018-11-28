$(document).ready(function() {
    //$("#img-out").hide();


    $('.ui.form')
        .form({
            fields: {
                titulo: 'empty',
                tipo: 'empty',
                gasto: 'empty'
            }
        })
    ;

    $('#gasto').change(function () {
        if ($('#gasto').val().length > 2){
            $('#gasto').addClass('disabled')
        }
    });

    $('select.dropdown')
        .dropdown()
    ;

    $('.clear').click(function () {
        $('#grafico').remove();
    });

    $('#clear').click(function () {
        $('.clear').trigger("click");
    });

    $('#id').hide();

    $('#titulo').keydown(function () {
        $('#grafico_titulo').text($('#titulo').val());
    });

    $('#funcao').change(function () {
        $('#gasto').parent().addClass('loading');
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
            }
        );
        $('#gasto').parent().removeClass('loading');
    });

    $('#salvar').click(function () {
        if( $('.ui.form').form('is valid')) {
            $.post('app/controller/crie.php',
                {
                    acao: 'salvar',
                    vals: {
                        dados: $('#gasto').val(),
                        titulo: $('#titulo').val(),
                        tipo: $('#tipo').val(),
                        id: $('#id').val()

                    }
                }, function (dados) {
                    var dado = JSON.parse(dados);

                    $('#salvo')
                        .modal('show')
                    ;

                    $('#id').val(dado['codigo']);
                    $('#share').show();
                })
        } else {
            $('.ui.form').form('validate form')
        }

    });

    $('#share').click(function () {
        $('#tituloModal').html($('#titulo').val());
        $('#post').attr('action',$('#post').attr('action') + '/' + $('#id').val());
        $('#publicar').modal('show');
    });

    /*function saveAs(uri, filename) {

        var link = document.createElement('a');

        if (typeof link.download === 'string') {

            link.href = uri;
            link.download = filename;

            //Firefox requires the link to be in the body
            document.body.appendChild(link);

            //simulate click
            link.click();

            //remove the link when done
            document.body.removeChild(link);

        } else {

            window.open(uri);

        }
    }

    $("#export").click(function() {
        html2canvas($("#print"), {
            onrendered: function(canvas) {
                theCanvas = canvas;
                document.body.appendChild(canvas);

                $("#img-out").html(canvas);

                var imgData = canvas.toDataURL();
                document.getElementById('img-out').src = imgData;

                document.getElementById('salvar').addEventListener('click', function(e){
                    this.href = imgData; // source
                    this.download = 'canvas.png'; // nome da imagem
                    return false;
                });
            }
        });
    });*/
});