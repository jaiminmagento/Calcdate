<?php
namespace Calc\Classes;

class Calculation
{
    public $fdate;
    public $tdate;
    public $fdatezone;
    public $tdatezone;

    public function __construct($fdate=null, $tdate=null, $fdatezone=null, $tdatezone=null)
    {
        $this->fdate = $fdate;
        $this->tdate = $tdate;
        $this->fdatezone = $fdatezone;
        $this->tdatezone = $tdatezone;
    }

    /**
     * @param $startDate
     * @param $endDate
     * @return bool
     * @throws \Exception
     */
    function validDate($startDate, $endDate) {
        $begin=strtotime($startDate);
        $end=strtotime($endDate);
        if($begin>$end){
            throw new \Exception("Form Date must be older than To date");
            return false;
        } else {
            return true;
        }
    }
    /**
     * @param $startDate
     * @param $endDate
     * @return string
     */
    function getDaysDiff($startDate, $endDate){
        $datetime1 = new \DateTime($startDate);
        $datetime2 = new \DateTime($endDate);
        $interval = $datetime1->diff($datetime2);
        $elapsed = $interval->format('%a days');
        return $elapsed;
    }

    /**
     * @param $startDate
     * @param $endDate
     * @return int
     */
    function getWorkingDaysDiff($startDate, $endDate){
        $begin=strtotime($startDate);
        $end=strtotime($endDate);
        $no_days=0;
        $weekends=0;
        while($begin<=$end){
            $no_days++; // no of days in the given interval
            $what_day=date("N",$begin);
            if($what_day>5) { // 6 and 7 are weekend days
                $weekends++;
            };
            $begin+=86400; // +1 day
        };
        $diff = $no_days - 1;
        $working_days=$diff-$weekends;
        return $working_days.'days';
    }

    /**
     * @param $time
     * @param $toTz
     * @param $fromTz
     * @return string
     */
    function converToTz($time, $toTz, $fromTz)
    {

        $date = new \DateTime($time, new \DateTimeZone($fromTz));
        $date->setTimezone(new \DateTimeZone($toTz));
        $time= $date->format('Y-m-d H:i:s');
        return $time;
    }

    /**
     * @param $datefrom
     * @param $dateto
     * @return float
     */
    function weeks_between($datefrom, $dateto)
    {
        $datetime1 = new \DateTime($datefrom);
        $datetime2 = new \DateTime($dateto);
        $interval = $datetime1->diff($datetime2);
        $week_total = $interval->format('%a')/7;
        return floor($week_total);
    }

}