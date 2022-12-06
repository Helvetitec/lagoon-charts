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
        return json_encode($this->data);
    }

    public function toArray():array{
        return $this->data;
    }

}