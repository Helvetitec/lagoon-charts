<?php

namespace Helvetiapps\LagoonCharts\Actions;

class SwitchAction{

    private $chartId;
    private $id;
    private $text;

    private $actions;

    public function __construct(string $id, string $text)
    {
        $this->chartId = 'chart';
        $this->id = $id;
        $this->text = $text;
        
        $this->actions = [];
    }

    public function addAction(string $javascript){
        array_push($this->actions, $javascript);
    }

    public function addActionAt(int $selection, string $javascript){
        $this->actions[$selection] = $javascript;
    }

    public function __toString()
    {
        $str = $this->chartId.".setAction({\n\r";
        $str .= "id: '".$this->id."',\n\r";
        $str .= "text: '".$this->text."',";
        $str .= "action: function() {\n\r";
        $str .= "selection = ".$this->chartId.".getSelection();\n\r";
        $str .= "switch (selection[0].row) {\n\r";
        foreach($this->actions as $case => $js){
            $str .= "case ".$case.": ".$js." break;\n\r";
        }
        $str .= "}\n\r";
        $str .= "}\n\r";
        $str .= "});\n\r";

        return $str;
    }
}