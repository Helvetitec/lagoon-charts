<div>
    @once
        @push('styles')
            <style>
                svg > g > g.google-visualization-tooltip { pointer-events: none }
            </style>
        @endpush
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

          var options = @json($optionsArray);

          var chart = new google.visualization.LineChart(document.getElementById('{{ $chartId.$random }}'));

          chart.draw(data, options);

          @if($printable)
            document.getElementById('lagoon-printable-{{ $chartId.$random }}').outerHTML = '<div style="display: flex; justify-content: center;"><a href="' + chart.getImageURI() + '">Print</a></div>';
          @endif
        }
    </script>

    <div id="{{ $chartId.$random }}" style="height: 100%; width: 100%;"></div>
    @if($printable)
      <div id="lagoon-printable-{{ $chartId.$random }}"></div>
    @endif
</div>
