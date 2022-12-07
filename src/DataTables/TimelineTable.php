<?php

namespace Helvetiapps\LagoonCharts\DataTables;

use Carbon\Carbon;
use Exception;

class TimelineTable{
    private $data = [];
    private $withTime;

    /**
     * Creates a new TimelineTable
     *
     * @param boolean $withTime If set to true, the dates will be added with time as well
     */
    public function __construct(bool $withTime = false)
    {
        $this->withTime = $withTime;
    }

    /**
     * Adds a new item to the table
     *
     * @param string $rowLabel The label of the row
     * @param string $barLabel The label of the bar
     * @param Carbon $start The start datetime of the item
     * @param Carbon $end The end datetime of the item
     * @return void
     */
    public function addItem(string $rowLabel, string $barLabel, Carbon $start, Carbon $end){
        $rowContent = [
            $rowLabel,
            $barLabel,
            $start,
            $end
        ];
        array_push($this->data, $rowContent);
    }

    /**
     * Returns a JSON representation of the rows.
     * Use this function to load the data inside the chart.
     * 
     * @return string
     */
    public function __toString()
    {
        $str = "[";

        $count = 0;
        foreach($this->data as $item){
            if($count > 0){
                $str .= ",";
            }
            $count++;

            $str .= "{c: [";
            $str .= "{v: '".$item[0]."'},";
            $str .= "{v: '".$item[1]."'},";
            if($this->withTime){
                $str .= "{v: new Date(".$item[2]->year.",".$item[2]->month.",".$item[2]->day.",".$item[2]->hour.",".$item[2]->minute.",".$item[2]->second.")},";
                $str .= "{v: new Date(".$item[3]->year.",".$item[3]->month.",".$item[3]->day.",".$item[3]->hour.",".$item[3]->minute.",".$item[3]->second.")}";
            }else{
                $str .= "{v: new Date(".$item[2]->year.",".$item[2]->month.",".$item[2]->day.")},";
                $str .= "{v: new Date(".$item[3]->year.",".$item[3]->month.",".$item[3]->day.")}";
            }
            
            $str .= "]}";
        }

        $str .= "]";

        return $str;
    }

    /**
     * Returns an array of the rows.
     *
     * @return array
     */
    public function toArray():array{
        return $this->data;
    }

}