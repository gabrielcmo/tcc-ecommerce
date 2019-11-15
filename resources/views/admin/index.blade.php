    <h4 class="mb-5">Bem-vindo ao painel de controle, {{ Auth::user()->name }}</h4>
    <div class="row">
        <div class="col-md-12">
            <div id="vendas_mensais"></div>
        </div>
        <div class="col-md-6">
            <div id="pedidos_status"></div>
        </div>
        <div class="col-md-12">
            <div id="lucro_chart"></div>
        </div>
    </div>

    <script type="text/javascript">
        var qtdPedidosMes = {!! $dadosChart['qtdPedidosMes'] !!};
        var qtdPedidosStatus = {!! $dadosChart['qtdPedidosStatus'] !!};

        google.charts.load('current', {'packages':['line', 'corechart']});
        google.charts.setOnLoadCallback(drawChart);
        google.charts.setOnLoadCallback(drawChart2);
        google.charts.setOnLoadCallback(drawLogScales);

        function drawChart() {

            var data = new google.visualization.arrayToDataTable(qtdPedidosMes);

            var options = {
                chart: {
                title: 'Total de vendas mensais',
                subtitle: 'A partir do dia 1 de janeiro'
                },
                width: 900,
                height: 500
            };

            var chart = new google.charts.Line(document.getElementById('vendas_mensais'));

            chart.draw(data, google.charts.Line.convertOptions(options));
        }

        function drawChart2() {

            var data = google.visualization.arrayToDataTable(qtdPedidosStatus);

            var options = {
                title: 'Pedidos e status'
            };

            var chart = new google.visualization.PieChart(document.getElementById('pedidos_status'));

            chart.draw(data, options);
        }
google.charts.setOnLoadCallback(drawLogScales);

function drawLogScales() {
      var data = new google.visualization.DataTable();
      data.addColumn('number', 'X');
      data.addColumn('number', 'Lucro');

      data.addRows([
        [1, 1],   
        [2, 1.5],  
        [3, 2],   
        [4, 2.5],  
        [5, 3],
        [6, 2.23],   
        [7, 4.7],  
        [8, 3.5],  
        [9, 2.9],  
        [10, 5],
        [11, 6],
        [12, 4]
      ]);

      var options = {
        hAxis: {
          title: 'Mês'
        },
        vAxis: {
          title: 'Valor em milhares de reais (R$)',
          logScale: false
        },
        colors: ['#13ec17']
      };

      var chart = new google.visualization.LineChart(document.getElementById('lucro_chart'));
      chart.draw(data, options);
    }
    </script>