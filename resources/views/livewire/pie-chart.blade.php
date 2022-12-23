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

        // Callback that creates and populates a data table,
        // instantiates the pie chart, passes in the data and
        // draws it.
        function drawChart{{ $chartId }}() {
            // Create the data table.
            var data = new google.visualization.DataTable();
            data.addColumn('string', '{{ $column1 }}');
            data.addColumn('number', '{{ $column2 }}');

            data.addRows(@json($chartData));

            // Set chart options
            var options = @json($optionsArray);

            // Instantiate and draw our chart, passing in some options.
            var chart = new google.visualization.PieChart(document.getElementById('{{ $chartId.$random }}'));

            @foreach($actions as $action)
            {!! $action !!}
            @endforeach

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
