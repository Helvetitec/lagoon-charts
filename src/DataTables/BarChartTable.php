<?php

namespace Helvetitec\LagoonCharts\DataTables;

use Exception;

class BarChartTable{

    private $data = [];
    private $colCount;

    /**
     * Creates a new BarChartTable
     *
     * @param string $xAxisLabel The Label shown on the x Axis
     * @param array $yAxisLabels The Labels shown on the x Axis
     * @param array $rows The rows added to the table, All rows need to have the same amount of columns which is count($yAxisLabels) + 1!
     */
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

    /**
     * Adds a new row to the table. Remember that each row needs to have the same amount of columns
     *
     * @param array $row The array of columns added to the row
     * @return void
     */
    public function addRow(array $row){
        if(count($row) != $this->colCount){
            throw new Exception("Row has ".count($row)." columns but needs to have ".$this->colCount."!");
        }
        array_push($this->data, $row);
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