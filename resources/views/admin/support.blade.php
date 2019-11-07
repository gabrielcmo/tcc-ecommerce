<h2>Suporte</h2>
<br>
<div id="dashboardSupport"><br>
    <div id="string_filter_div_support"></div>
    <div id="string_filter_name_div_support"></div>
</div>
<div style="text-align:center!important;" id="support_table"></div>

<script type="text/javascript">
    var analyticsSuporte = {!! $dadosChart['suporte'] !!};
    google.charts.load('current', {'packages':['table', 'controls']});
    google.charts.setOnLoadCallback(drawTable);

    function drawTable() {
        var data = new google.visualization.arrayToDataTable(analyticsSuporte);
        data.addColumn('string', '');

        var dashboard = new google.visualization.Dashboard(document.querySelector('#dashboardSupport'));

        for(var i = 0; i < data.getNumberOfRows(); i++){
            var suporte_id = analyticsSuporte[i+1][0];
            data.setCell(i, 4, "<a href=" + "/admin/suporte/" + suporte_id + ">Ver mensagem</a>");
        }


        var stringFilterSupport = new google.visualization.ControlWrapper({
            controlType: 'StringFilter',
            containerId: 'string_filter_div_support',
            options: {
                filterColumnIndex: 0
            }
        });
        
        var stringFilterNameSupport = new google.visualization.ControlWrapper({
            controlType: 'StringFilter',
            containerId: 'string_filter_name_div_support',
            options: {
                filterColumnIndex: 3
            }
        });

        var table = new google.visualization.ChartWrapper({
            chartType: 'Table',
            containerId: 'support_table',
            options: {
                allowHtml: true,
                showRowNumber: true,
                width: '100%',
                height: '100%'
            }
        });

        dashboard.bind([stringFilterSupport, stringFilterNameSupport], [table]);
        dashboard.draw(data);
    }
</script>