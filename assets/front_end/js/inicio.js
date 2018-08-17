$(document).ready(function(){

    $('#titulo')
        .visibility({
            once: false,
            onBottomPassed: function() {
                $('.fixed.menu').transition('fade in');
            },
            onBottomPassedReverse: function() {
                $('.fixed.menu').transition('fade out');
            }
        })
    ;

    // create sidebar and attach to menu open
    $('.ui.sidebar')
        .sidebar('attach events', '.toc.item')
    ;


    $('#oculta').hide();
    $('#oculta2').hide();
    $('#oculta3').hide();

    $('.bxslider').bxSlider({
        mode: 'horizontal',
        moveSlides: 1,
        slideMargin: 0,
        infiniteLoop: true,
        minSlides: 1,
        maxSlides: 1,
        speed: 1000,
        auto: true,
        responsive: true
    });


    var quantia1 = [];
    var dado1 = [];
    var quantia2 = [];
    var dado2 = [];
    var quantia3 = [];
    var dado3 = [];

    $('.quantia').each(function(){
       quantia1.push($(this).text());
    });

    $('.dado').each(function(){
       dado1.push($(this).text());
    });

    $('.quantia2').each(function(){
        quantia2.push($(this).text());
    });

    $('.dado2').each(function(){
        dado2.push($(this).text());
    });

    $('.quantia3').each(function(){
        quantia3.push($(this).text());
    });

    $('.dado3').each(function(){
        dado3.push($(this).text());
    });

    var ctx = document.getElementById('chart').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'pie',

        data: {
            datasets: [{
                data: quantia1,
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
                borderWidth: 0
            }],
            labels: dado1
        }
    });

    var ctx2 = document.getElementById('chart2').getContext('2d');
    var myChart2 = new Chart(ctx2, {
        type: 'doughnut',

        data: {
            datasets: [{
                data: quantia2,
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
                borderWidth: 0
            }],
            labels: dado2
        }
    });


    var ctx3 = document.getElementById('chart3').getContext('2d');
    var myChart3 = new Chart(ctx3, {
        type: 'pie',

        data: {
            datasets: [{
                data: quantia3,
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
                borderWidth: 0
            }],
            labels: dado3
        }
    });


});

Chart.defaults.global.legend.position = 'right';

Chart.defaults.global.legend.display = false;
