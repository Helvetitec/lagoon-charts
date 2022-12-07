<?php

namespace Helvetiapps\LagoonCharts\DataTables;

use Carbon\Carbon;

class GanttChartTable{
    private $data = [];

    /**
     * Adds a new Task to the GanttChartTable
     *
     * @param string $id The ID of the Task
     * @param string $name The name of the Task displayed in the tooltip
     * @param Carbon $start The start date of the task
     * @param Carbon $end The end date of the task
     * @param integer $duration The duration of the task in days
     * @param integer $completion The percentage of completion of the task
     * @param string|null $dependencies The depencies of the task as string
     * @return void
     */
    public function addTask(string $id, string $name, Carbon $start, Carbon $end, int $duration, int $completion, ?string $dependencies){
        array_push($this->data, [
            $id,
            $name,
            null,
            "Date(".$start->year.','.($start->month - 1).','.$start->day.")",
            "Date(".$end->year.','.($end->month - 1).','.$end->day.")",
            $duration * 24 * 60 * 60 * 1000,
            $completion,
            $dependencies
        ]);
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
            $str .= "{c: [{v: '".$item[0]."'}, {v: '".$item[1]."'}, {v: '".$item[2]."'}, {v: '".$item[3]."'}, {v: '".$item[4]."'}, {v: '".$item[5]."'}, {v: '".$item[6]."'}, {v: '".$item[7]."'}]}";
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