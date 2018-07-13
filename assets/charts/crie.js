$(document).ready(function(){
    $("#teste").click(function(){
        if($("#nome").val() == "eua"){
            var data = [20,30,40]
        } else {
            var data = [50,30,20]
        }
        var ctx = document.getElementById("myChart").getContext('2d');
        var myChart = new Chart(ctx,{
            type: 'pie',

            data: {
                datasets: [{
                    data: data,
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.8)',
                        'rgba(54, 162, 235, 0.8)',
                        'rgba(255, 206, 86, 0.8)'

                    ],
                    borderColor: [
                        'rgba(255,99,132,1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)'
                    ],
                    borderWidth: 0
                }],

                // These labels appear in the legend and in the tooltips when hovering different arcs
                labels: [
                    'Red',

                    'Blue',
                    'Yellow'
                ]
            }

        });
    });

    var jqxhr = $.getJSON( "documents/mongoDB/db/dados.json", function() {
        alert( "success" );
    });

    $.getJSON( "documents/mongoDB/db/dados.json", function( data ) {
        var items = ["<option class=\"item\" data-value=\"null\">...</option>"];
        $.each( data, function( key, val ) {
            items.push( "<option id='" + val['codigo'] + "' class='item' data-value='" + val['gasto'] +"'>" + val['nome'] + "</option>" );
        });

        $( "<select/>", {
            "class": "ui search dropdown",
            html: items.join( "" )
        }).appendTo( ".gasto" );
    });
});
