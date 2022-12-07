<?php

namespace Helvetiapps\LagoonCharts;

use Helvetiapps\LagoonCharts\Http\Livewire\LineChart;
use Helvetiapps\LagoonCharts\Http\Livewire\PieChart;
use Helvetiapps\LagoonCharts\Http\Livewire\AreaChart;
use Helvetiapps\LagoonCharts\Http\Livewire\BarChart;
use Helvetiapps\LagoonCharts\Http\Livewire\CandlestickChart;
use Helvetiapps\LagoonCharts\Http\Livewire\ColumnChart;
use Helvetiapps\LagoonCharts\Http\Livewire\GanttChart;
use Helvetiapps\LagoonCharts\Http\Livewire\WaterfallChart;
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
    Livewire::component('lagoon-gantt-chart', ColumnChart::class);
    Livewire::component('lagoon-candlestick-chart', CandlestickChart::class);
    Livewire::component('lagoon-waterfall-chart', WaterfallChart::class);

    if ($this->app->runningInConsole())
    {
      $this->publishes([
        __DIR__.'/../config/config.php' => config_path('lagoon.php'),
      ], 'config');
    }
  }
}
