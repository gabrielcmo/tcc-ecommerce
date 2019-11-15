<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<h2>Tickets</h2>
=======
<h2>Ticket</h2>
>>>>>>> parent of 14b811b... Formulários P. de Controle em portugues e estilizados
=======
<h2>Ticket</h2>
>>>>>>> parent of 14b811b... Formulários P. de Controle em portugues e estilizados
=======
<h2>Ticket</h2>
>>>>>>> parent of 14b811b... Formulários P. de Controle em portugues e estilizados
<br>
<div id="dashboardTicket"><br>
    <div id="string_filter_div_ticket"></div>
    <div id="string_filter_name_div_ticket"></div>
</div>
<div style="text-align:center!important;" id="ticket_table"></div>
<script type="text/javascript">
    var analyticsTicket = {!! $dadosChart['tickets'] !!};
    google.charts.load('current', {'packages':['table', 'controls']});
    google.charts.setOnLoadCallback(drawTable);

    function drawTable() {
        var data = new google.visualization.arrayToDataTable(analyticsTicket);
        data.addColumn('string', '');
        var dashboard = new google.visualization.Dashboard(document.querySelector('#dashboardTicket'));
        for(var i = 0; i < data.getNumberOfRows(); i++){
            var ticket_id = analyticsTicket[i+1][0];

            if (analyticsTicket[i+1][4] === null) {
                data.setCell(i, 8, "<a class='btn btn-link btn-sm' href=" + "/admin/ticket/edit/" + ticket_id + ">Responder mensagem</a>");
            } else {
                data.setCell(i, 8, '<span class="text-success">Mensagem Respondida!</span>')
            }
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
                filterColumnIndex: 1
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