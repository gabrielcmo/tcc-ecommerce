@extends('layouts.admin')

@section('title', 'Painel inicial - Suporte')

@section('content')
    <h2>Mensagens</h2>
    <br>
    <div id="dashboard">
        <div id="string_filter_div"></div>
        <div id="string_filter_userEmail_div"></div>
    </div>
    <div id="messages_table"></div>
@endsection

@section('scripts')
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

    <script type="text/javascript">
        var messages = {!! $messages !!};
        google.charts.load('current', {'packages':['table', 'controls']});
        google.charts.setOnLoadCallback(drawTable);

        function drawTable() {
            var data = new google.visualization.arrayToDataTable(messages);
            data.addColumn('string', '');

            var dashboard = new google.visualization.Dashboard(document.querySelector('#dashboard'));

            var stringFilter = new google.visualization.ControlWrapper({
                controlType: 'StringFilter',
                containerId: 'string_filter_div',
                options: {
                    filterColumnIndex: 0
                }
            });
            
            var stringFilterUserEmail = new google.visualization.ControlWrapper({
                controlType: 'StringFilter',
                containerId: 'string_filter_userEmail_div',
                options: {
                    filterColumnIndex: 2
                }
            });

            for(var i = 0; i < data.getNumberOfRows(); i++){
                var message_id = messages[i+1][0];
                data.setCell(i, 5, "<a href=" + "/admin/message/" + message_id  + ">Ver mensagem</a>");
            }

            var table = new google.visualization.ChartWrapper({
                chartType: 'Table',
                containerId: 'messages_table',
                options: {
                    allowHtml: true,
                    showRowNumber: true
                }
            });

            dashboard.bind([stringFilter, stringFilterUserEmail], [table])
            dashboard.draw(data);
        }
    </script>
@endsection