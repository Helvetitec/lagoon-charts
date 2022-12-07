<?php

namespace Helvetiapps\LagoonCharts\DataTables;

use Carbon\Carbon;
use Exception;

class TimelineTable{
    private $data = [];
    private $colCount = 4;

    public function __construct()
    {

    }

    public function addItem(string $rowLabel, string $barLabel, Carbon $start, Carbon $end){
        $rowContent = [
            $rowLabel,
            $barLabel,
            $start,
            $end
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
            $str .= "{v: '".$item[0]."'},";
            $str .= "{v: '".$item[1]."'},";
            $str .= "{v: new Date(".$item[2]->year.",".$item[2]->month.",".$item[2]->day.",".$item[2]->hour.",".$item[2]->minute.",".$item[2]->second.")},";
            $str .= "{v: new Date(".$item[3]->year.",".$item[3]->month.",".$item[3]->day.",".$item[3]->hour.",".$item[3]->minute.",".$item[3]->second.")}";
            $str .= "]}";
        }

        $str .= "]";

        return $str;
    }

    public function toArray():array{
        return $this->data;
    }

}