<?php

namespace Helvetiapps\LagoonCharts\DataTables;

use Exception;

class AreaChartTable{

    private $data = [];
    private $colCount;

    public function __construct(string $xAxisLabel, array $yAxisLabels, array $rows = [])
    {
        $this->colCount = count($yAxisLabels) + 1;
        $rowCount = 0;
        $labels = [$xAxisLabel];
        foreach($yAxisLabels as $label){
            array_push($labels, $label);
        }
        $this->data = [$labels];
        foreach($rows as $row){
            $rowCount++;
            if(count($row) != $this->colCount){
                throw new Exception("Row ".$rowCount." has ".count($row)." columns but needs to have ".$this->colCount."!");
            }
            array_push($this->data, $row);
        }
    }

    public function addRow(array $row){
        if(count($row) != $this->colCount){
            throw new Exception("Row has ".count($row)." columns but needs to have ".$this->colCount."!");
        }
        array_push($this->data, $row);
    }

    public function __toString()
    {
        return json_encode($this->data);
    }

    public function toArray():array{
        return $this->data;
    }
}