<div>
    @once
        @push('headerScripts')
            <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
            <script type="text/javascript">
             google.charts.load('current', {'packages':['corechart'], 'language': '{{ config("lagoon.language") }}'});
            </script>
        @endpush
    @endonce

    <script type="text/javascript">
        google.charts.setOnLoadCallback(drawChart{{ $chartId }});

        function drawChart{{ $chartId }}() {
          var data = google.visualization.arrayToDataTable(
            @json($chartData)
          );

          var options = {
            title: '{{ $title }}',
            @if(!is_null($height)) height: {{ $height }}, @endif
            @if(!is_null($width)) width: {{ $width}}, @endif
            @json($options)
          };

          var chart = new google.visualization.LineChart(document.getElementById('{{ $chartId.$random }}'));

          chart.draw(data, options);
        }
    </script>

    <div id="{{ $chartId.$random }}" style="height: 100%; width: 100%;"></div>
</div>
