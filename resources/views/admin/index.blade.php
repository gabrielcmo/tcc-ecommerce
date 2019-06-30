@extends('layouts.admin')

@section('title', 'Painel inicial')

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

    {{ debug(($qtdPedidosMes), $qtdPedidosStatus) }}
@endsection

@section('scripts')
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

    <script type="text/javascript">
        var qtdPedidosMes = {!! $qtdPedidosMes !!};
        var qtdPedidosStatus = {!! $qtdPedidosStatus !!};

        google.charts.load('current', {'packages':['line', 'corechart']});
        google.charts.setOnLoadCallback(drawChart);
        google.charts.setOnLoadCallback(drawChart2);

        function drawChart() {

            var data = new google.visualization.arrayToDataTable(qtdPedidosMes);

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

        function drawChart2() {

            var data = google.visualization.arrayToDataTable(qtdPedidosStatus);

            var options = {
                title: 'Pedidos e status'
            };

            var chart = new google.visualization.PieChart(document.getElementById('piechart'));

            chart.draw(data, options);
        }
    </script>
@endsection