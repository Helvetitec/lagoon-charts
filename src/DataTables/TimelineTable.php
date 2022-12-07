<?php

namespace Helvetiapps\LagoonCharts\DataTables;

use Carbon\Carbon;
use Exception;

class TimelineTable{
    private $data = [];
    private $colCount = 5;

    public function __construct()
    {

    }

    public function addItem(string $rowLabel, string $barLabel, Carbon $start, Carbon $end){
        $rowContent = [
            $rowLabel,
            $barLabel,
            "Date(".$start->year.','.($start->month - 1).','.$start->day.")",
            "Date(".$end->year.','.($end->month - 1).','.$end->day.")"
        ];
        array_push($this->data, $rowContent);
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

            $str .= "{c: [";
            for($i = 0; $i < $this->colCount; $i++){
                if($i > 0){
                    $str .= ",";
                }
                $str .= "{v: '".$item[$i]."'}";
            }
            $str .= "]}";
        }

        $str .= "]";

        return $str;
    }

    public function toArray():array{
        return $this->data;
    }

}