@extends('layouts.admin')

@section('title', 'Painel inicial - Suporte')

@section('content')
    <h2>Mensagens</h2>
    <br>

    <div id="messages_table"></div>
@endsection

@section('scripts')
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

    <script type="text/javascript">
        var messages = {!! $messages !!};
        google.charts.load('current', {'packages':['table']});
        google.charts.setOnLoadCallback(drawTable);

        function drawTable() {
            var data = new google.visualization.arrayToDataTable(messages);
            data.addColumn('string', '');

            for(var i = 0; i < data.getNumberOfRows(); i++){
                var message_id = messages[i+1][0];
                data.setCell(i, 5, "<a href=" + "/admin/message/" + message_id  + ">Ver mensagem</a>");
            }

            var table = new google.visualization.Table(document.getElementById('messages_table'));

            table.draw(data, {allowHtml: true, showRowNumber: true, width: '100%', height: '100%'});
        }
    </script>
@endsection