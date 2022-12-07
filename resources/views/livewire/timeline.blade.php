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
              google.charts.load('current', {'packages':['timeline'], 'language': '{{ config("lagoon.language") }}'});
            </script>
        @endpush
    @endonce

    <script type="text/javascript">
        google.charts.setOnLoadCallback(drawChart{{ $chartId }});

        function drawChart{{ $chartId }}() {
            var data = new google.visualization.DataTable(
                {
                    cols: 
                    [
                        {id: 'rowLabel', label: 'Row Label', type: 'string'},
                        {id: 'barLabel', label: 'Bar Label', type: 'string'},
                        {id: 'start', label: 'Start Date', type: 'date'},
                        {id: 'end', label: 'End Date', type: 'date'}
                    ],
                    rows: {!! $chartData !!}
                }
            );

            var options = @json($optionsArray);
            var chart = new google.visualization.Timeline(document.getElementById('{{ $chartId.$random }}'));

            chart.draw(data, options);
        }
    </script>

    <div id="{{ $chartId.$random }}" style="height: 100%; width: 100%;"></div>
</div>
