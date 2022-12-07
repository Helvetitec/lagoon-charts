# Lagoon Charts
Google Charts for Laravel Livewire

**Warning: This is a very early version of the library and changes on the codebase WILL be made**


## Requirements

* Laravel 9+
* Livewire 2+


## Installation

Run composer:
```
composer require helvetiapps/lagoon-charts
```


## Included Charts


* Area Charts
* Bar Charts
* Candlestick Charts
* Column Charts
* Line Charts
* Pie Charts
* Gantt Charts (Preview)


## TODO

* Add HTML Tooltips as custom class
* Add all types of Charts


## Usage


### Pie Chart

Livewire
```php
$pieChartTable = new \HelvetiApps\LagoonCharts\DataTables\PieChartTable();
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
$lineChartTable = new \HelvetiApps\LagoonCharts\DataTables\LineChartTable('xAxis', ['yAxis1', 'yAxis2']);
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
$candlestickChartTable = new \HelvetiApps\LagoonCharts\DataTables\CandlestickChartTable();
$candlestickChartTable->addRow([1, 100, 200]);
$candlestickChartTable->addRow([2, 200, 100]);
$data = $candlestickChartTable->toArray();
```

Blade
```
@livewire('lagoon-candlestick-chart', ['chartId' => 'uniqueID', 'chartData' => $data, 'height' => 300, 'width' => 400, 'title' => 'Title', 'options' => []], key('uniquekey'.now()))
```


### Bar Chart

Livewire
```php
$barChartTable = new \HelvetiApps\LagoonCharts\DataTables\BarChartTable('xAxis', ['yAxis1', 'yAxis2']);
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
$columnChartTable = new \HelvetiApps\LagoonCharts\DataTables\ColumnChartTable('xAxis', ['yAxis1', 'yAxis2']);
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
$areaChartTable = new \HelvetiApps\LagoonCharts\DataTables\AreaChartTable('xAxis', ['yAxis1', 'yAxis2']);
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