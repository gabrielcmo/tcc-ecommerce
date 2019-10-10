@extends('layouts.admin')

@section('title', "Cupons")

@section('content')
    <h2>Cupons</h2>
    <br>
    <a href="/admin/cupom/create" class="btn btn-info">Adicionar cupom</a>
    <div id="dashboard"><br>
        <div id="string_filter_div"></div>
        <div id="string_filter_name_div"></div>
    </div>
    <div style="text-align:center!important;" id="cupons_table"></div>
@endsection

@section('scripts')
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

    <script type="text/javascript">
        var analytics = {!! $cupons !!};
        google.charts.load('current', {'packages':['table', 'controls']});
        google.charts.setOnLoadCallback(drawTable);

        function drawTable() {
            var data = new google.visualization.arrayToDataTable(analytics);
            data.addColumn('string', '');

            var dashboard = new google.visualization.Dashboard(document.querySelector('#dashboard'));

            function confirmDelete(){
                event.preventDefault();
                            if(confirm("Você tem certeza disso?")){window.location.href = "/admin/cupom/analytics.id/destroy"}
            }

            for(var i = 0; i < data.getNumberOfRows(); i++){
                var product_id = analytics[i+1][0];
                data.setCell(i, 4, "<a href=" + "/admin/cupom/" + product_id + "/destroy" + "><i class='fas fa-trash-alt'></i></a>");
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

            var table = new google.visualization.ChartWrapper({
                chartType: 'Table',
                containerId: 'cupons_table',
                options: {
                    allowHtml: true,
                    showRowNumber: true,
                    width: '100%',
                    height: '100%'
                }
            });

            dashboard.bind([stringFilter, stringFilterName], [table]);
            dashboard.draw(data);
        }
    </script>
@endsection