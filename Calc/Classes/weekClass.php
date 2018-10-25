<?php
namespace Calc\Classes;

class weekClass
{
    public $weeks;

    public function __construct($weeks=null)
    {
        $this->weeks = $weeks;
    }

    /**
     * @param $weeks
     * @return string
     */
    function weekstodifferent($weeks){
        if(is_numeric($weeks)){
            $days = $weeks*7;
            $years = $days/365;
            $hours = $days*24;
            $min = $hours*60;
            $seconds = $min*60;
            return "Years : ".$years." Hours : ".$hours." Minutes : ".$min." Seconds :".$seconds;
        } else {
            throw new \Exception("Weeks value must be numeric.");
        }

    }
}