@extends('adminlte::page')

@section('title', 'Grafico de Pedidos por Estado')

@section('content_header')
    <h1 class="text-center">Gráfico de Productos</h1>
@stop

@section('content')
    <div class="container-fluid p-2 shadow bg-body rounded">
        <figure class="highcharts-figure">
            <div id="grafico"></div>
        </figure>
    </div>
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/data.js"></script>
    <script src="https://code.highcharts.com/modules/drilldown.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/export-data.js"></script>
    <script src="https://code.highcharts.com/modules/accessibility.js"></script>
    <script>
        // Create the chart
Highcharts.chart('grafico', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Productos mas comprados'
    },
    subtitle: {
        text: ''
    },
    accessibility: {
        announceNewData: {
            enabled: true
        }
    },
    xAxis: {
        type: 'Productos'
    },
    yAxis: {
        title: {
            text: 'Cantidad Vendida'
        }

    },
    legend: {
        enabled: true
    },
    plotOptions: {
        series: {
            borderWidth: 0,
            dataLabels: {
                enabled: true,
                format: '{point.y:1.f}'
            }
        }
    },

    tooltip: {
        headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
        pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.2f}</b><br/>'
    },

    series: [
        {
            name: "Productos",
            colorByPoint: true,
            data: <?php echo $data;?>
        }
    ],
});
    </script>
@stop