<?php

namespace Helvetitec\LagoonCharts;

use Helvetitec\LagoonCharts\Http\Livewire\LineChart;
use Helvetitec\LagoonCharts\Http\Livewire\PieChart;
use Helvetitec\LagoonCharts\Http\Livewire\AreaChart;
use Helvetitec\LagoonCharts\Http\Livewire\BarChart;
use Helvetitec\LagoonCharts\Http\Livewire\CandlestickChart;
use Helvetitec\LagoonCharts\Http\Livewire\ColumnChart;
use Helvetitec\LagoonCharts\Http\Livewire\GanttChart;
use Helvetitec\LagoonCharts\Http\Livewire\Timeline;
use Helvetitec\LagoonCharts\Http\Livewire\WaterfallChart;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use Livewire\Livewire;

class LagoonServiceProvider extends ServiceProvider
{
  public function register()
  {
    $this->mergeConfigFrom(__DIR__.'/../config/config.php', 'lagoon');
  }

  public function boot()
  {
    $this->loadViewsFrom(__DIR__.'/../resources/views', 'lagoon');
    Livewire::component('lagoon-line-chart', LineChart::class);
    Livewire::component('lagoon-pie-chart', PieChart::class);
    Livewire::component('lagoon-area-chart', AreaChart::class);
    Livewire::component('lagoon-bar-chart', BarChart::class);
    Livewire::component('lagoon-gantt-chart', GanttChart::class);
    Livewire::component('lagoon-column-chart', ColumnChart::class);
    Livewire::component('lagoon-candlestick-chart', CandlestickChart::class);
    Livewire::component('lagoon-waterfall-chart', WaterfallChart::class);
    Livewire::component('lagoon-timeline', Timeline::class);

    Blade::directive('lagoonScripts', function ($localization, $package = 'corechart') {
      return '<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
      <script type="text/javascript">
        google.charts.load(\'current\', {\'packages\':[\''.$package.'\'], \'language\': \''.$localization.'\'});
      </script>';
    });

    Blade::directive('lagoonStyles', function ($localization) {
      return '<style>
      svg > g > g.google-visualization-tooltip { pointer-events: none }
      </style>';
    });

    if ($this->app->runningInConsole())
    {
      $this->publishes([
        __DIR__.'/../config/config.php' => config_path('lagoon.php'),
      ], 'config');
    }
  }
}
