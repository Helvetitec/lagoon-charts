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
              google.charts.load('current', {'packages':['gantt'], 'language': '{{ $localization }}'});
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
                        {id: 'id', label: 'Task ID', type: 'string'},
                        {id: 'name', label: 'Task Name', type: 'string'},
                        {id: 'resource', label: 'Resource', type: 'string'},
                        {id: 'start', label: 'Start Date', type: 'date'},
                        {id: 'end', label: 'End Date', type: 'date'},
                        {id: 'duration', label: 'Duration', type: 'number'},
                        {id: 'percent', label: 'Percent Complete', type: 'number'},
                        {id: 'dependencies', label: 'Dependencies', type: 'string'}
                    ],
                    rows: {!! $chartData !!}
                }
            );

            var options = @json($optionsArray);
            var chart = new google.visualization.Gantt(document.getElementById('{{ $chartId.$random }}'));

            chart.draw(data, options);
        }
    </script>

    <div id="{{ $chartId.$random }}" style="height: 100%; width: 100%;"></div>
</div>
