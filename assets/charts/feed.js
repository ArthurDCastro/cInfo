
// Load the Visualization API and the corechart package.
google.charts.load('current', {'packages':['corechart']});

// Set a callback to run when the Google Visualization API is loaded.
google.charts.setOnLoadCallback(drawChart);

// Callback that creates and populates a data table,
// instantiates the pie chart, passes in the data and
// draws it.
function drawChart() {

    // Create the data table.
    var data = new google.visualization.DataTable();
    data.addColumn('string', 'Topping');
    data.addColumn('number', 'Slices');
    data.addRows([
        ['Mushrooms', 3],
        ['Onions', 2],
        ['Olives', 5],
        ['Zucchini', 4],
        ['Pepperoni', 2]
    ]);

    // Set chart options
    var piechart_options = {title:'Pie Chart: How Much Pizza I Ate Last Night',
        width:400,
        height:300};
    var piechart = new google.visualization.PieChart(document.getElementById('piechart_div'));
    piechart.draw(data, piechart_options);

    var barchart_options = {title:'Barchart: How Much Pizza I Ate Last Night',
        width:400,
        height:300,
        legend: 'none'};
    var barchart = new google.visualization.BarChart(document.getElementById('barchart_div'));
    barchart.draw(data, barchart_options);

    var donutchart_options = {
        title: 'My Daily Activities',
        width:400,
        height:300,
        pieHole: 0.4
    };

    var donutchart = new google.visualization.PieChart(document.getElementById('donutchart_div'));
    donutchart.draw(data, donutchart_options);
}