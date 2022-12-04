<?php

namespace Helvetiapps\LagoonCharts\Http\Livewire;

use Carbon\Carbon;
use Livewire\Component;

class PieChart extends Component
{
    public $title = "NO_TITLE";
    public $chartData = [];
    
    public $chartId;
    public $random;

    public function render()
    {
        $this->random = Carbon::now()->timestamp;
        return view('lagoon::livewire.pie-chart');
    }
}
