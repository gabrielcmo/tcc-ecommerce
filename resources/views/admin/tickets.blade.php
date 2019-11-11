<h2>Suporte</h2>
<br>
<div id="dashboardTicket"><br>
    <div id="string_filter_div_ticket"></div>
    <div id="string_filter_name_div_ticket"></div>
</div>
<div style="text-align:center!important;" id="ticket_table"></div>

<script type="text/javascript">
    var analyticsSuporte = {!! $dadosChart['tickets'] !!};
    google.charts.load('current', {'packages':['table', 'controls']});
    google.charts.setOnLoadCallback(drawTable);

    function drawTable() {
        var data = new google.visualization.arrayToDataTable(analyticsSuporte);
        data.addColumn('string', '');

        var dashboard = new google.visualization.Dashboard(document.querySelector('#dashboardTicket'));

        for(var i = 0; i < data.getNumberOfRows(); i++){
            var suporte_id = analyticsSuporte[i+1][0];
            data.setCell(i, 4, "<a href=" + "/admin/ticket/" + suporte_id + ">Responder mensagem</a>");
        }


        var stringFilterTicket = new google.visualization.ControlWrapper({
            controlType: 'StringFilter',
            containerId: 'string_filter_div_ticket',
            options: {
                filterColumnIndex: 0
            }
        });
        
        var stringFilterNameTicket = new google.visualization.ControlWrapper({
            controlType: 'StringFilter',
            containerId: 'string_filter_name_div_ticket',
            options: {
                filterColumnIndex: 3
            }
        });

        var table = new google.visualization.ChartWrapper({
            chartType: 'Table',
            containerId: 'ticket_table',
            options: {
                allowHtml: true,
                showRowNumber: true,
                width: '100%',
                height: '100%'
            }
        });

        dashboard.bind([stringFilterTicket, stringFilterNameTicket], [table]);
        dashboard.draw(data);
    }
</script>