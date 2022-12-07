<?php

namespace Helvetiapps\LagoonCharts\DataTables;

use Exception;

class PieChartTable{
    private $data = [];

    /**
     * Creates a new PieChartTable
     * @param array $rows The rows added to the table, All rows need to have a name and a value!
     */
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

    /**
     * Adds a new row to the table
     *
     * @param string $name The name of the row shown in the tooltip
     * @param [type] $value The value fo the row shown in the tooltip. Needs to be numeric!
     * @return void
     */
    public function addRow(string $name, $value){
        if(!is_numeric($value)){
            throw new Exception("The second value of the row in a Pie Chart needs to be a number!");
        }
        array_push($this->data, [$name, $value]);
    }

    /**
     * Returns a JSON representation of the rows
     *
     * @return string
     */
    public function __toString()
    {
        return json_encode($this->data);
    }

    /**
     * Returns an array of the rows.
     * Use this function to load the data inside the chart.
     *
     * @return array
     */
    public function toArray():array{
        return $this->data;
    }
}