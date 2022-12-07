<?php

namespace Helvetiapps\LagoonCharts\DataTables;

use Exception;

class CandlestickChartTable{

    private $data = [];
    private $colCount;

    /**
     * Creates a new CandlestickChartTable
     *
     * @param array $rows The rows added to the table, all rows need to have the same amount of columns as the first row in the array
     */
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

    /**
     * Adds a new row to the table. Remember that each row needs to have the same amount of columns
     *
     * @param array $row The array of columns added to the row
     * @return void
     */
    public function addRow(array $row){
        if($this->colCount == 0){
            $this->colCount = count($row);
        }
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