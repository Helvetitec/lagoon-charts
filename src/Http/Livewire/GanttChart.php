<?php

namespace Helvetitec\LagoonCharts\Http\Livewire;

use Carbon\Carbon;
use Livewire\Component;

class GanttChart extends Component
{
    public $chartData = [];

    public $height;
    public $width;

    public $column1;
    public $column2;
    
    public $options;

    public $chartId;
    public $random;

    public $optionsArray;

    public $localization;
    
    public $viewMode;

    public function mount(){
        if(is_null($this->localization)){
            $this->localization = config("lagoon.language");
        }

        $newOptions = [
            'title' => 'None'
        ];

        if(!is_null($this->viewMode)){
            if($this->viewMode == 'light')
            {
                //Set background color to transparent
                $newOptions["backgroundColor"]["fill"] = config('lagoon.lightmodeBackground', 'transparent');
                $newOptions["hAxis"]["titleTextStyle"]["color"] = config('lagoon.lightmodeForeground', '#000000');
                $newOptions["vAxis"]["titleTextStyle"]["color"] = config('lagoon.lightmodeForeground', '#000000');
                $newOptions["legend"]["textStyle"]["color"] = config('lagoon.lightmodeForeground', '#000000');
            }elseif($this->viewMode == 'dark'){
                //Set background color to transparent
                $newOptions["backgroundColor"]["fill"] = config('lagoon.darkmodeBackground', 'transparent');
                $newOptions["hAxis"]["titleTextStyle"]["color"] = config('lagoon.darkmodeForeground', '#ffffff');
                $newOptions["vAxis"]["titleTextStyle"]["color"] = config('lagoon.darkmodeForeground', '#ffffff');
                $newOptions["legend"]["textStyle"]["color"] = config('lagoon.darkmodeForeground', '#ffffff');
            }
        }

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
        return view('lagoon::livewire.gantt-chart');
    }
}
