@extends('layouts.admin')

@section('title', 'Painel de Controle - Pedidos')

@section('content')
    <h2>Pedidos</h2>
    <br>

    <div id="orders_table"></div>
@endsection

@section('scripts')
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

    <script type="text/javascript">
        var orders = {!! $orders !!};
        google.charts.load('current', {'packages':['table']});
        google.charts.setOnLoadCallback(drawTable);

        function drawTable() {
            var data = new google.visualization.arrayToDataTable(orders);
            data.addColumn('string', 'Editar');

            
            for(var i = 0; i < data.getNumberOfRows(); i++){
                var order_id = orders[i+1][0];
                data.setCell(i, 5, "<a href=" + "/admin/order/" + order_id + "/destroy" + "><i class='fas fa-trash'></i></a>");
            }


            var table = new google.visualization.Table(document.getElementById('orders_table'));

            table.draw(data, {allowHtml: true, showRowNumber: true, width: '100%', height: '100%'});
        }
    </script>
@endsection