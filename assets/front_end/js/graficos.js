$(document).ready(function() {
    $('#oculta').hide();

    $('.msgExcluir').click(function () {
        var id = $(this).parent().attr('id');
        var txt = $('#oculta').html();
        if (id != txt){
            $('#modal_excluir').modal('show');
            $('#oculta').html(id)
        }
    });

    $('#excluir').click(function () {

        var base = $('base').attr('href');

        var url = window.location.href;

        var user = url.replace(base,'').split('/')[1];

        $.post('app/controller/perfil.php',
            {
                acao: 'excluir',
                id: $('#oculta').html(),
                user: user
            }, function (dados) {
                $('#conteudo').html('');
                $('#conteudo').html(dados);
            }
        );
    });

    $('.info').hide();

    $('.grafico').each(function () {

        var id = $(this).attr('id');

        var dados = [];
        for (i in $('#' + id).find('.gasto')) {
            var g = $('#' + id).find('.gasto').eq(i).text();
            if ( g.length > 1){
                dados.push($('#' + id).find('.gasto').eq(i).text());
            }

        }


        var label = [];
        for (i in $('#' + id).find('.nome')) {
            var n = $('#' + id).find('.nome').eq(i).text();
            if ( n.length > 1) {
                label.push($('#' + id).find('.nome').eq(i).text());
            }
        }

        var ctx = document.getElementById('chart-' + id).getContext('2d');
        var myChart = new Chart(ctx, {
            type: $('#tipo-' + id).text(),

            data: {
                datasets: [{
                    data: dados,
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.8)',
                        'rgba(54, 162, 235, 0.8)',
                        'rgba(255, 206, 86, 0.8)',

                        'rgba(105, 255, 221, 0.8)',
                        'rgba(92, 78, 232, 0.8)',
                        'rgba(232, 176, 78, 0.8)',
                        'rgba(180, 255, 86, 0.8)',

                        'rgba(246, 211, 62, 0.8)',
                        'rgba(38, 212, 46, 0.8)',
                        'rgba(164, 38, 212, 0.8)',
                        'rgba(246, 100, 44, 0.8)',

                        'rgba(140, 92, 255, 0.8)',
                        'rgba(232, 75, 67, 0.8)',
                        'rgba(114, 232, 67, 0.8)',
                        'rgba(73, 228, 255, 0.8)'

                    ],
                    borderColor: [
                        'rgba(255,99,132,1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)'
                    ],
                    borderWidth: 0
                }],
                labels: label
            },
        });
    });
});

Chart.defaults.global.legend.display = false;
Chart.defaults.global.tooltips.enabled = false;