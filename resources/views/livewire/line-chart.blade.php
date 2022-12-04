<div>
    @once
        @push('headerScripts')
            <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
            <script type="text/javascript">
             google.charts.load('current', {'packages':['corechart'], 'language': 'pt_BR'});
            </script>
        @endpush
    @endonce

    <script type="text/javascript">
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
          var data = google.visualization.arrayToDataTable(
            @json($chartData)
          );

          var options = {
            title: '{{ $title }}',
            hAxis: { format: '', showTextEvery: 1, ticks: 1, slantedText: true},
            vAxis: { format: 'currency'},
            legend: { position: 'bottom' }
          };

          var chart = new google.visualization.LineChart(document.getElementById('{{ $chartId.$random }}'));

          chart.draw(data, options);
        }
    </script>

    <div id="{{ $chartId.$random }}"></div>
</div>
