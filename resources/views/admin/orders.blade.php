    <h2>Pedidos</h2>
    <br>

    @php
        $orders = Doomus\Order::all();
    @endphp

    <div id="dashboard">
        <div id="string_filter_div"></div>
        <div id="string_filter_userID_div"></div>
    </div>
    <div id="orders_table"></div>

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

    <script type="text/javascript">
        var orders = {!! $orders !!};
        google.charts.load('current', {'packages':['table', 'controls']});
        google.charts.setOnLoadCallback(drawTable);

        function drawTable() {
            var data = new google.visualization.arrayToDataTable(orders);
            data.addColumn('string', 'Editar');

            var dashboard = new google.visualization.Dashboard(document.querySelector('#dashboard'));

            var stringFilter = new google.visualization.ControlWrapper({
                controlType: 'StringFilter',
                containerId: 'string_filter_div',
                options: {
                    filterColumnIndex: 0
                }
            });
            
            var stringFilterUserId = new google.visualization.ControlWrapper({
                controlType: 'StringFilter',
                containerId: 'string_filter_userID_div',
                options: {
                    filterColumnIndex: 2
                }
            });

            for(var i = 0; i < data.getNumberOfRows(); i++){
                var order_id = orders[i+1][0];
                data.setCell(i, 5, "<a href=" + "/admin/order/" + order_id + "/cancel" + ">CANCELAR</a>" + 
                "&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;" + "<a href=" + "/admin/order/" + order_id + "/despachado" + ">DESPACHADO</a>" +
                "&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;" + "<a href=" + "/admin/order/" + order_id + "/aprovado" + ">APROVADO</a>" +
                "&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;" + "<a href=" + "/admin/order/" + order_id + "/entregue" + ">ENTREGUE</a>");
            }
            
            // for(var i = 0; i < data.getNumberOfRows(); i++){
            //     var product_id = products[i+2][1];
            //     data.setCell(i, 5, product_id);
            // }

            var table = new google.visualization.ChartWrapper({
                chartType: 'Table',
                containerId: 'orders_table',
                options: {
                    allowHtml: true,
                    showRowNumber: true
                }
            });

            dashboard.bind([stringFilter, stringFilterUserId], [table]);
            dashboard.draw(data);
        }
    </script>