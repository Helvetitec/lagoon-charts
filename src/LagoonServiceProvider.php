<?php

namespace Helvetiapps\LagoonCharts;

use Helvetiapps\LagoonCharts\Http\Livewire\LineChart;
use Helvetiapps\LagoonCharts\Http\Livewire\PieChart;
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

    if ($this->app->runningInConsole())
    {
      $this->publishes([
        __DIR__.'/../config/config.php' => config_path('lagoon.php'),
      ], 'config');
    }
  }
}
