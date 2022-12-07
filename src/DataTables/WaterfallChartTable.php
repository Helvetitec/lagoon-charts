<?php

namespace Helvetiapps\LagoonCharts\DataTables;

use Exception;

class WaterfallChartTable{

    private $data = [];
    private $colCount = 5;

    public function __construct(array $rows = [])
    {
        $rowCount = 0;

        $this->data = [];
        foreach($rows as $row){
            $rowCount++;
            if(count($row) != $this->colCount){
                throw new Exception("Row ".$rowCount." has ".count($row)." columns but needs to have ".$this->colCount."!");
            }
            array_push($this->data, $row);
        }
    }

    public function addRow(string $label, $min, $max){
        array_push($this->data, [$label, $min, $min, $max, $max]);
    }

    public function __toString()
    {
        return json_encode($this->data);
    }

    public function toArray():array{
        return $this->data;
    }
}