<?php

namespace Helvetiapps\LagoonCharts\DataTables;

use Exception;

class CandlestickChartTable{

    private $data = [];
    private $colCount;

    public function __construct(array $rows = [])
    {
        $this->colCount = count($rows) < 1 ? 0 : count($rows[0]);
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

    public function addRow(array $row){
        if($this->colCount == 0){
            $this->colCount = count($row);
        }
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