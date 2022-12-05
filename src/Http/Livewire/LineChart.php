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
    
    public $options; 

    public $chartId;
    public $random;

    public $optionsArray;

    public function mount(){
        $newOptions = [
            'title' => $this->title,
        ];

        if(!is_null($this->height)){
            $newOptions["height"] = $this->height;
        }
        if(!is_null($this->width)){
            $newOptions["width"] = $this->width;
        }
        foreach($this->options as $key => $value){
            $newOptions[$key] = $value;
        }

        $this->optionsArray = $newOptions;
    }

    public function render()
    {
        $this->random = Carbon::now()->timestamp;
        return view('lagoon::livewire.line-chart');
    }
}
