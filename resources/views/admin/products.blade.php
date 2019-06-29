@extends('layouts.admin')

@section('title')
    Painel de Controle - Produtos
@endsection

@section('content')
    <h2>Produtos</h2>
    <br>

    <a href="/admin/product/create" class="btn btn-info">Adicionar um produto</a>
    <a href="/admin/product/analytics.id/edit"><i class="fas fa-pencil-alt"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;
                        <a onclick='event.preventDefault();
                            if(confirm("Você tem certeza disso?")){window.location.href = "/admin/product/analytics.id/destroy"}'>
                            <i class="fas fa-trash-alt"></i></a>
    <br>
    <br>

    <div id="products_table"></div>

@endsection

@section('scripts')
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

    <script type="text/javascript">
        var analytics = {!! $products !!};
        google.charts.load('current', {'packages':['table']});
        google.charts.setOnLoadCallback(drawTable);

        function drawTable() {
            var data = new google.visualization.arrayToDataTable(analytics);
            data.addColumn('string', 'Editar');

            var table = new google.visualization.Table(document.getElementById('products_table'));

            var formatter = new google.visualization.NumberFormat(
                {prefix: 'R$'});
            formatter.format(data, 2);

            table.draw(data, {showRowNumber: true, width: '100%', height: '100%'});
        }
    </script>
@endsection