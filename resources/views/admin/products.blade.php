@extends('layouts.admin')

@section('title', 'Painel de Controle - Produtos')

@section('content')
    <h2>Produtos</h2>
    <br>
    <a href="/admin/product/create" class="btn btn-info">Adicionar um produto</a>
    <div id="dashboard"><br>
        <div id="string_filter_div"></div>
        <div id="string_filter_name_div"></div>
        <div id="number_range_filter_div"></div>
    </div>
    <div id="products_table"></div>
@endsection

@section('scripts')
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

    <script type="text/javascript">
        var analytics = {!! $products !!};
        google.charts.load('current', {'packages':['table', 'controls']});
        google.charts.setOnLoadCallback(drawTable);

        function drawTable() {
            var data = new google.visualization.arrayToDataTable(analytics);
            data.addColumn('string', 'Editar');

            var dashboard = new google.visualization.Dashboard(document.querySelector('#dashboard'));

            function confirmDelete(){
                event.preventDefault();
                            if(confirm("Você tem certeza disso?")){window.location.href = "/admin/product/analytics.id/destroy"}
            }

            for(var i = 0; i < data.getNumberOfRows(); i++){
                var product_id = analytics[i+1][0];
                data.setCell(i, 5, "<a href=" + "/admin/product/" + product_id + "/edit" + "><i class='fas fa-pencil-alt'></i></a>&nbsp;&nbsp;&nbsp;&nbsp;<a href=" + "/admin/product/" + product_id + "/destroy" + "><i class='fas fa-trash-alt'></i></a>");
            }

            var stringFilter = new google.visualization.ControlWrapper({
                controlType: 'StringFilter',
                containerId: 'string_filter_div',
                options: {
                    filterColumnIndex: 0
                }
            });
            
            var stringFilterName = new google.visualization.ControlWrapper({
                controlType: 'StringFilter',
                containerId: 'string_filter_name_div',
                options: {
                    filterColumnIndex: 1
                }
            });

            var numberRangeFilter = new google.visualization.ControlWrapper({
                controlType: 'NumberRangeFilter',
                containerId: 'number_range_filter_div',
                options: {
                    filterColumnIndex: 3,
                    minValue: 0,
                    maxValue: 1000,
                    ui: {
                        label: 'Valor'
                    }
                }
            });

            var table = new google.visualization.ChartWrapper({
                chartType: 'Table',
                containerId: 'products_table',
                options: {
                    allowHtml: true,
                    showRowNumber: true,
                    width: '100%',
                    height: '100%'
                }
            });

            var formatter = new google.visualization.NumberFormat(
                {prefix: 'R$'});
            formatter.format(data, 3);

            dashboard.bind([stringFilter, stringFilterName, numberRangeFilter], [table]);
            dashboard.draw(data);
        }
    </script>
@endsection