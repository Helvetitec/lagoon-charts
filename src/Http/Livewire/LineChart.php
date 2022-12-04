<?php

namespace Helvetiapps\LagoonCharts\Http\Livewire;

use Carbon\Carbon;
use Livewire\Component;

class LineChart extends Component
{
    public $title = "NO_TITLE";
    public $chartData = [];

    public $height;
    public $width;

    public $format = "none";
    
    public $options = ""; 

    public $chartId;
    public $random;

    public function render()
    {
        $this->random = Carbon::now()->timestamp;
        return view('lagoon::livewire.line-chart');
    }
}
