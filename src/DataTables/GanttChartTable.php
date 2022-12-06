<?php

namespace Helvetiapps\LagoonCharts\DataTables;

use Carbon\Carbon;
use Helvetiapps\LagoonCharts\Dummies\Date;

class GanttChartTable{
    private $data = [];

    public function addTask(string $id, string $name, Carbon $start, Carbon $end, int $duration, int $completion, ?string $dependencies){
        array_push($this->data, [
            $id,
            $name,
            null,
            new Date($start->year,($start->month - 1),$start->day,0,0,0,0),
            new Date($end->year,($end->month - 1),$end->day,0,0,0,0),
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