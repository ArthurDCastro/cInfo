$(document).ready(function() {

    $('#oculta').hide();

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



    $('.quantia').each(function(){
        quantia1.push($(this).text());
    });

    $('.dado').each(function(){
        dado1.push($(this).text());
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
});