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

        // Callback that creates and populates a data table,
        // instantiates the pie chart, passes in the data and
        // draws it.
        function drawChart{{ $chartId }}() {
            // Create the data table.
            var data = new google.visualization.DataTable();
            @foreach($columns as $cType => $cTitle)
                data.addColumn('{{ $cType }}', '{{ $cTitle }}');
            @endforeach
            // data.addColumn('string', 'Name');
            // data.addColumn('number', 'Value');
            data.addRows(@json($chartData));

            // Set chart options
            var options = @json($optionsArray);

            // Instantiate and draw our chart, passing in some options.
            var chart = new google.visualization.PieChart(document.getElementById('{{ $chartId.$random }}'));
            chart.draw(data, options);
        }
    </script>

    <div id="{{ $chartId.$random }}" style="height: 100%; width: 100%;"></div>
</div>
