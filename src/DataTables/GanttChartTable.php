<?php

namespace Helvetiapps\LagoonCharts\DataTables;

use Carbon\Carbon;

class GanttChartTable{
    private $data = [];

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

    public function toArray():array{
        return $this->data;
    }

}