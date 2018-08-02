$(document).ready(function(){

    $("#teste").click(function(){
        $('#myChart').remove();
        $('#chart').html(
            '<h2 class="ui header">\n' +
            '  <i class="pie chart icon"></i>\n' +
            '  <div class="content">\n' +
            $('#titulo').val() +
            '  </div>\n' +
            '</h2><canvas id="myChart" width="400" height="300"></canvas>');

        var list = [];
        var gastos = $('#gasto').val();

        $.post('app/controller/crie.php',
            {
                acao: 'teste',
                vals: gastos
            }, function (dados) {
                var dbParam = JSON.parse(dados);

                var data = [];
                for (i in dbParam['gasto']){
                    data.push(dbParam['gasto'][i]);
                }

                var label = [];
                for (i in dbParam['nome']){
                    label.push(dbParam['nome'][i]);
                }

                var ctx = document.getElementById("myChart").getContext('2d');
                var myChart = new Chart(ctx,{
                    type: $('#tipo').val(),
                    data: {
                        datasets: [{
                            data: data,
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

                        // These labels appear in the legend and in the tooltips when hovering different arcs
                        labels: label
                    },
                    title: {
                        display: true,
                        position: 'top',
                        text: $('#titulo').val()
                    }

            });



        });
    });
});
