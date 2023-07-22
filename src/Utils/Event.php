<?php

namespace Helvetitec\LagoonCharts\Utils;

use Exception;

class Event{
    public $chartId = 'chart';
    private $jsCall;
    private $type;

    public function __construct(EventType $type, string $jsCall)
    {
        $this->jsCall = $jsCall;
        $this->type = $type;    
    }

    public function __toString()
    {
        switch ($this->type) {
            case EventType::Select:
                return "google.visualization.events.addListener(".$this->chartId.",'select', function(){\n\r
                    var selection = ".$this->chartId.".getSelection();\n\r
                    ".$this->jsCall."\n\r
                })\n\r";
                break;
            case EventType::Ready:
                return "google.visualization.events.addListener(".$this->chartId.", 'ready', function(){\n\r
                    ".$this->jsCall."\n\r
                });\n\r";
                break;
            case EventType::Error:
                return "google.visualization.events.addListener(".$this->chartId.", 'error', function(err){\n\r
                    ".$this->jsCall."\n\r
                });\n\r";
                break;
        }
        throw new Exception('Invalid EventType "'.$this->type.'"!');
    }
}