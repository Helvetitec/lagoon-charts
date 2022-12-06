<?php

namespace Helvetiapps\LagoonCharts\DataTables;

use Exception;

class LineChartTable{

    private $data = [];
    private $colCount;

    public function __construct(int $colCount, $rows = [])
    {
        $this->colCount = $colCount;
        $rowCount = 0;
        foreach($rows as $row){
            $rowCount++;
            if(count($row) != $colCount){
                throw new Exception("Row ".$rowCount." has ".count($row)." columns but needs to have ".$colCount."!");
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