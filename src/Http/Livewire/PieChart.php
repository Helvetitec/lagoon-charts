<?php

namespace Helvetiapps\LagoonCharts\Http\Livewire;

use Carbon\Carbon;
use Helvetiapps\LagoonCharts\Objects\ChartOptions;
use Livewire\Component;

class PieChart extends Component
{
    public $title = "NO_TITLE";
    public $chartData = [];

    public $height;
    public $width;

    public $options = "";

    public $chartId;
    public $random;

    public function render()
    {
        $this->random = Carbon::now()->timestamp;
        return view('lagoon::livewire.pie-chart');
    }
}
