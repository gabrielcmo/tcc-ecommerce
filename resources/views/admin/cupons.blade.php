    <h2>Cupons</h2>
    <br>
    <a href="{{route('admin.cupom.create')}}" class="btn btn-info">Adicionar cupom</a>
    <div id="dashboardCupom"><br>
        <div id="string_filter_div_cupom"></div>
        <div id="string_filter_name_div_cupom"></div>
    </div>
    <div style="text-align:center!important;" id="cupons_table"></div>

    <script type="text/javascript">
        var analytics = {!! $dadosChart['cupons'] !!};
        google.charts.load('current', {'packages':['table', 'controls']});
        google.charts.setOnLoadCallback(drawTable);

        function drawTable() {
            var data = new google.visualization.arrayToDataTable(analytics);
            data.addColumn('string', '');

            var dashboard = new google.visualization.Dashboard(document.querySelector('#dashboardCupom'));

            var domain = document.location.host;

            if (domain == "www.doomus.com.br" || domain == "doomus.com.br") {
            domain = "https://www.doomus.com.br/public/admin";
            } else {
            domain = 'http://localhost:8000/admin';
            }

            for(var i = 0; i < data.getNumberOfRows(); i++){
                var product_id = analytics[i+1][0];
                data.setCell(i, 4, "<a href=" + domain + "/cupom/destroy/" + product_id + "><i class='fas fa-trash-alt'></i></a>");
            }

            var stringFilterCupom = new google.visualization.ControlWrapper({
                controlType: 'StringFilter',
                containerId: 'string_filter_div_cupom',
                options: {
                    filterColumnIndex: 0
                }
            });
            
            var stringFilterNameCupom = new google.visualization.ControlWrapper({
                controlType: 'StringFilter',
                containerId: 'string_filter_name_div_cupom',
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

            dashboard.bind([stringFilterCupom, stringFilterNameCupom], [table]);
            dashboard.draw(data);
        }
    </script>