<?php

namespace Helvetiapps\LagoonCharts\DataTables;

use Carbon\Carbon;

class GanttChartTable{
    private $data = [];

    public function addTask(string $id, string $name, Carbon $start, Carbon $end, int $duration, int $completion, ?string $dependencies){
        array_push($this->data, [ "c" =>
            [
                "v" => $id,
                "v" => $name,
                "v" => null,
                "v" => "Date(".$start->year.','.($start->month - 1).','.$start->day.")",
                "v" => "Date(".$end->year.','.($end->month - 1).','.$end->day.")",
                "v" => $duration * 24 * 60 * 60 * 1000,
                "v" => $completion,
                "v" => $dependencies
            ]
        ]);
    }

    public function __toString()
    {
        return json_encode($this->data);
    }

    public function toArray():array{
        return $this->data;
    }

}