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
    //
  }

  public function boot()
  {
    Livewire::component('lagoon-line-chart', LineChart::class);
    Livewire::component('lagoon-pie-chart', PieChart::class);
  }
}
