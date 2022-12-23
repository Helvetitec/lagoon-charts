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
    
    public $actions;
    public $events;
    
    public $printable = false;

    public function mount(){
        if(is_null($this->actions) || !is_array($this->actions)){
            $this->actions = [];
        }
        if(is_null($this->events) || !is_array($this->events)){
            $this->events = [];
        }
        
        $newOptions = [
            'title' => $this->title,
        ];

        if(!is_null($this->height)){
            $newOptions["height"] = $this->height;
        }
        if(!is_null($this->width)){
            $newOptions["width"] = $this->width;
        }
        if(!is_null($this->options) && is_array($this->options)){
            foreach($this->options as $key => $value){
                $newOptions[$key] = $value;
            }
        }

        $this->optionsArray = $newOptions;
    }

    public function render()
    {
        $this->random = Carbon::now()->timestamp;
        return view('lagoon::livewire.line-chart');
    }
}
