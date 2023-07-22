<?php

namespace Helvetitec\LagoonCharts\DataTables;

use Exception;

class WaterfallChartTable{

    private $data = [];
    private $colCount = 5;

    /**
     * Creates a new WaterfallChartTable
     *
     * @param array $rows The rows added to the table, all rows need to have 5 columns. Name, Min, Min, Max, Max.
     */
    public function __construct(array $rows = [])
    {
        $rowCount = 0;

        $this->data = [];
        foreach($rows as $row){
            $rowCount++;
            if(count($row) != $this->colCount){
                throw new Exception("Row ".$rowCount." has ".count($row)." columns but needs to have ".$this->colCount."!");
            }
            array_push($this->data, $rows);
        }
    }

    /**
     * Adds a new row to the table
     *
     * @param string $label The label of the row shown in the tooltip
     * @param [type] $min The minimum value of the row. Needs to be numeric
     * @param [type] $max The maximum value of the row. Needs to be numeric and bigger than $min
     * @return void
     */
    public function addRow(string $label, $min, $max){
        if(!is_numeric($min)){
            throw new Exception("The minimum value is not numeric but '".$min."'");
        }
        if(!is_numeric($max)){
            throw new Exception("The maximum value is not numeric but '".$max."'");
        }
        if($min > $max){
            throw new Exception("The minimum value is bigger than the maximum value!");
        }
        array_push($this->data, [$label, $min, $min, $max, $max]);
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