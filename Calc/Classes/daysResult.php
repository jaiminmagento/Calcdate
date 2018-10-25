<?php
namespace Calc\Classes;

class daysResult
{
    public $days;

    public function __construct($days=null)
    {
        $this->days = $days;
    }

    /**
     * @param $days
     * @return string
     */
    function daystodifferent($days){
        if(is_numeric($days)) {
            $years = $days / 365;
            $hours = $days * 24;
            $min = $hours * 60;
            $seconds = $min * 60;
            return "Years : " . $years . " Hours : " . $hours . " Minutes : " . $min . " Seconds :" . $seconds;
        } else {
            throw new \Exception("Days value must be numeric.");
        }
    }
}