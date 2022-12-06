<?php

namespace Helvetiapps\LagoonCharts\DataTables;

use Exception;

class PieChartTable{
    private $data;

    public function __construct($rows = [])
    {
        foreach($rows as $row){
            if(count($row) != 2){
                throw new Exception("Number of items inside a Pie Chart row needs to be exactly two!");
            }
            if(!is_string($row[0])){
                throw new Exception("The first value of the row in a Pie Chart needs to be a string!");
            }
            if(!is_numeric($row[1])){
                throw new Exception("The second value of the row in a Pie Chart needs to be a number!");
            }
            array_push($this->data, $row);
        }
    }

    public function addRow(string $name, $value){
        if(!is_numeric($value)){
            throw new Exception("The second value of the row in a Pie Chart needs to be a number!");
        }
        array_push($this->data, [$name, $value]);
    }

    public function __toString()
    {
        return json_encode($this->data);
    }

    public function toArray():array{
        return $this->data;
    }
}