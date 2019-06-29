@extends('layouts.admin')

@section('title')
    Painel inicial
@endsection

@section('content')
    <h2>Bem-vindo ao painel de controle, {{ Auth::user()->name }}</h2>
    <br><br>

    <div class="row">
        <div class="col-md-12">
            <div id="linechart"></div>
        </div>
        <div class="col-md-6">
            <div id="piechart"></div>
        </div>
    </div>
@endsection

@section('scripts')
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

    <script type="text/javascript">
        google.charts.load('current', {'packages':['line']});
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {

            var data = new google.visualization.DataTable();
            data.addColumn('number', 'Mês');
            data.addColumn('number', 'Vendas');

            data.addRows([
                [1,  37],
                [2,  30],
                [3,  25],
                [4,  11],
                [5,  11],
                [6,   8],
                [7,   7],
                [8,  12],
                [9,  16],
                [10, 12],
                [11,  90],
                [12,  6]  
            ]);

            var options = {
                chart: {
                title: 'Total de vendas mensais',
                subtitle: 'A partir do dia 1 de janeiro'
                },
                width: 900,
                height: 500
            };

            var chart = new google.charts.Line(document.getElementById('linechart'));

            chart.draw(data, google.charts.Line.convertOptions(options));
        }

        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawChart2);

        function drawChart2() {

            var data = google.visualization.arrayToDataTable([
                ['Pedidos', 'Total de pedidos'],
                ['Aprovados', 111],
                ['Recusados', 13],
                ['Cancelados', 20]
            ]);

            var options = {
                title: 'Pedidos'
            };

            var chart = new google.visualization.PieChart(document.getElementById('piechart'));

            chart.draw(data, options);
        }
    </script>
@endsection