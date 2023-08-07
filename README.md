# Lagoon Charts
[Google Charts](https://developers.google.com/chart/interactive/docs) for Laravel [Livewire](https://laravel-livewire.com/)


## Requirements

* Laravel 9+
* Livewire 3+


## Installation

Run composer:
```
composer require helvetitec/lagoon-charts:~2.0
```

For Livewire 2:
```
composer require helvetitec/lagoon-charts:~1.0
```


## Included Charts


- [x] Area Charts
- [x] Bar Charts
- [x] Candlestick Charts
- [x] Column Charts
- [x] Line Charts
- [x] Pie Charts
- [x] Waterfall Charts
- [x] Timelines
- [x] Gantt Charts
- [ ] Other Charts

## Included Functions

- [x] Actions
- [x] Events (Selected, Ready, Error)
- [ ] Tailwind Darkmode (Would be nice if it would be automatically set, maybe with the right fontcolor and such, only important for frontend)
- [ ] Custom Tooltips
- [ ] HTML Tooltips


## Usage

### Prepare View
Important, since Version 2.2 you will need to add @lagoonScripts and @lagoonStyles to your layouts!

Add Styles:
```blade
@lagoonStyles <!-- This will add a small style part which will cause tooltipps stop cliping when hover over with the mouse -->
```

CoreCharts:
```blade
@lagoonScripts('en') <!-- The only parameter needed is the localization parameter, you can use any language recognized by Google -->
@lagoonScripts({{ app()->getLocale() }}) <!-- This will set the localization to the locale set in Laravel -->
```

Gantt Charts:
```blade
@lagoonScripts('en', 'gantt') <!-- To make Gantt Charts working, you'll need to load the package -->
@lagoonScripts('en', ['corechart', 'gantt']) <!-- If you have multiple chart types, add them as an array -->
```

Timeline Charts:
```blade
@lagoonScripts('en', 'timeline') <!-- To make Timeline Charts working, you'll need to load the package -->
@lagoonScripts('en', ['corechart', 'timeline']) <!-- If you have multiple chart types, add them as an array -->
```

### Pie Chart

Livewire
```php
$pieChartTable = new \Helvetitec\LagoonCharts\DataTables\PieChartTable();
$pieChartTable->addRow("Row1", 20);
$pieChartTable->addRow("Row2", 30);
$data = $pieChartTable->toArray();
```

Blade
```
@livewire('lagoon-pie-chart', ['chartId' => 'uniqueID', 'chartData' => $data, 'title' => 'Title', 'width' => 400, 'height' => 200, 'column1' => 'Col1Label', 'column2' => 'Col2Label'], key('uniqueKey'.now()))
```


### Line Chart

Livewire
```php
$lineChartTable = new \Helvetitec\LagoonCharts\DataTables\LineChartTable('xAxis', ['yAxis1', 'yAxis2']);
$lineChartTable->addRow([1, 100, 200]);
$lineChartTable->addRow([2, 200, 100]);
$data = $lineChartTable->toArray();
```

Blade
```
@livewire('lagoon-line-chart', ['chartId' => 'uniqueID', 'chartData' => $data, 'height' => 300, 'width' => 400, 'title' => 'Title', 'options' => []], key('uniquekey'.now()))
```


### Candlestick Chart

Livewire
```php
$candlestickChartTable = new \Helvetitec\LagoonCharts\DataTables\CandlestickChartTable();
$candlestickChartTable->addRow([1, 100, 200]);
$candlestickChartTable->addRow([2, 200, 100]);
$data = $candlestickChartTable->toArray();
```

Blade
```
@livewire('lagoon-candlestick-chart', ['chartId' => 'uniqueID', 'chartData' => $data, 'height' => 300, 'width' => 400, 'title' => 'Title', 'options' => []], key('uniquekey'.now()))
```


### Waterfall Chart

Livewire
```php
$waterfallChartTable = new \Helvetitec\LagoonCharts\DataTables\WaterfallChartTable();
$waterfallChartTable->addRow("Mon", 100, 200);
$waterfallChartTable->addRow("Tue", 200, 300);
$data = $waterfallChartTable->toArray();
```

Blade
```
@livewire('lagoon-waterfall-chart', ['chartId' => 'uniqueID', 'chartData' => $data, 'height' => 300, 'width' => 400, 'title' => 'Title', 'options' => []], key('uniquekey'.now()))
```


### Bar Chart

Livewire
```php
$barChartTable = new \Helvetitec\LagoonCharts\DataTables\BarChartTable('xAxis', ['yAxis1', 'yAxis2']);
$barChartTable->addRow([1, 100, 200]);
$barChartTable->addRow([2, 200, 100]);
$data = $barChartTable->toArray();
```

Blade
```
@livewire('lagoon-bar-chart', ['chartId' => 'uniqueID', 'chartData' => $data, 'height' => 300, 'width' => 400, 'title' => 'Title', 'options' => []], key('uniquekey'.now()))
```


### Column Chart

Livewire
```php
$columnChartTable = new \Helvetitec\LagoonCharts\DataTables\ColumnChartTable('xAxis', ['yAxis1', 'yAxis2']);
$columnChartTable->addRow([1, 100, 200]);
$columnChartTable->addRow([2, 200, 100]);
$data = $columnChartTable->toArray();
```

Blade
```
@livewire('lagoon-column-chart', ['chartId' => 'uniqueID', 'chartData' => $data, 'height' => 300, 'width' => 400, 'title' => 'Title', 'options' => []], key('uniquekey'.now()))
```


### Area Chart

Livewire
```php
$areaChartTable = new \Helvetitec\LagoonCharts\DataTables\AreaChartTable('xAxis', ['yAxis1', 'yAxis2']);
$areaChartTable->addRow([1, 100, 200]);
$areaChartTable->addRow([2, 200, 100]);
$data = $areaChartTable->toArray();
```

Blade
```
@livewire('lagoon-area-chart', ['chartId' => 'uniqueID', 'chartData' => $data, 'height' => 300, 'width' => 400, 'title' => 'Title', 'options' => []], key('uniquekey'.now()))
```

### Gantt Chart

Livewire
```php
$ganttChartTable = new GanttChartTable();

$ganttChartTable->addTask("test1", "Test1", Carbon::now(), Carbon::now()->copy()->addMonth(), 30, 100, null);
$ganttChartTable->addTask("test2", "Test2", Carbon::now()->copy()->addMonth(), Carbon::now()->copy()->addMonths(2), 30, 100, "test1");

$data = $ganttChartTable->__toString(); //IMPORTANT USE __toString() here!
```

Blade
```
@livewire('lagoon-gantt-chart', ['chartId' => 'uniqueID', 'chartData' => $data, 'height' => 300, 'width' => 400, 'options' => []], key('uniquekey'.now()))
```

### Timeline

Livewire
```php
$timelineTable = new TimelineTable(true); //The parameter sets if the hours, minutes and seconds should be included in the date

$timelineTable->addTask("Person 1", "Project 1", Carbon::now(), Carbon::now()->copy()->addHour());
$timelineTable->addTask("Person 2", "Project 1", Carbon::now()->copy()->addHour(), Carbon::now()->copy()->addHours(2));

$data = $timelineTable->__toString(); //IMPORTANT USE __toString() here!
```

Blade
```
@livewire('lagoon-timeline', ['chartId' => 'uniqueID', 'chartData' => $data, 'height' => 300, 'width' => 400, 'options' => []], key('uniquekey'.now()))
```


### Add options to the Charts

You can add options with the 'options' => ['option1' => 'something'] variable.
You can add all options that are inside the respective Google Chart.

Blade
```
@livewire('lagoon-area-chart', ['chartId' => 'uniqueID', 'chartData' => $data, 'height' => 300, 'width' => 400, 'title' => 'Title', 'options' => ['backgroundColor' => 'black']], key('uniquekey'.now()))
```


### Add link to Chart PNG

You can add a link to a PNG from the chart by adding 'printable' => true, this does only work with corecharts!

Blade
```
@livewire('lagoon-area-chart', ['chartId' => 'uniqueID', 'chartData' => $data, 'height' => 300, 'width' => 400, 'title' => 'Title', 'options' => [], 'printable' => true], key('uniquekey'.now()))
```


### Using Actions

You can use actions inside the charts by adding the SwitchAction object.

PHP
```php
$switchAction = new \Helvetitec\LagoonCharts\Actions\SwitchAction("action", "Test Action");

$switchAction->addAction("alert('hello world!');"); //Adds a single javascript action to the list (starting at index 0)

$switchAction->addActionAt(0, "alert('hello world, again!');"); //Adds a single javascript action to a specific index

$switchStr = $switchAction->__toString();

$actions = [
    $switchStr
];
```

Blade
```
@livewire('lagoon-area-chart', ['chartId' => 'uniqueID', 'chartData' => $data, 'height' => 300, 'width' => 400, 'title' => 'Title', 'options' => [], 'actions' => $actions], key('uniquekey'.now()))
```


### Using Events

You can use events inside the charts to interact with the charts and the data within

PHP
```php
$readyEvent = new \Helvetitec\LagoonCharts\Utils\Event(\Helvetitec\LagoonCharts\Utils\EventType::Ready, "alert('hello, i\'m ready');");

//The error event will include an err variable
$errorEvent = new \Helvetitec\LagoonCharts\Utils\Event(\Helvetitec\LagoonCharts\Utils\EventType::Error, "alert('ops!' + err);");

//The select event will include a selection variable, which represents chart.getSelection();
$selectEvent = new \Helvetitec\LagoonCharts\Utils\Event(\Helvetitec\LagoonCharts\Utils\EventType::Select, "alert(selection[0][0]);");

$eventArr = [
    'ready' => $readyEvent->__toString(),
    'error' => $errorEvent->__toString(),
    'select' => $selectEvent->__toString()
];
```

Blade
```
@livewire('lagoon-area-chart', ['chartId' => 'uniqueID', 'chartData' => $data, 'height' => 300, 'width' => 400, 'title' => 'Title', 'options' => [], 'events' => $eventArr], key('uniquekey'.now()))
```
