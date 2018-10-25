<?php
use Calc\Classes\Calculation;

class CalculationTest extends PHPUnit_Framework_TestCase
{
    public function setUp()
    {
        $this->Calculation = new Calculation();
    }

    public function tearDown()
    {
        $this->Calculation = NULL;
    }
    public function validDateProviders()
    {
        return [
            ['2018-10-01T05:30', '2018-10-10T05:30'],
            ['2018-09-01T05:30', '2018-10-01T05:30'],
            ['2017-09-01T05:30', '2018-10-01T05:30'],
            ['2015-09-01T05:30', '2017-09-01T05:30']
        ];
    }

    public function InvalidDateProviders()
    {
        return [
            ['2018-10-10T05:30', '2018-10-01T05:30'],
            ['2018-10-01T05:30', '2018-09-01T05:30'],
            ['2018-10-01T05:30', '2017-09-01T05:30'],
            ['2017-09-01T05:30', '2015-09-01T05:30']
        ];
    }

    public function TimezoneProvider()
    {
        return [
            ['2018-10-10T05:30', 'Asia/Kolkata', 'US/Central'],
            ['2017-09-01T05:30', 'US/Eastern', 'America/Lima'],
            ['2015-09-01T05:30', 'Europe/Dublin', 'Europe/Budapest'],
            ['2018-10-10T05:30', 'Asia/Kolkata', 'Europe/Volgograd'],
            ['2018-10-10T05:30', 'Australia/Adelaide', 'Asia/Kolkata']
        ];
    }
    /**
     * @dataProvider validDateProviders
     */
    public function testItInputDateIsValid($startDate, $endDate)
    {
        $this->assertTrue($this->Calculation->validDate($startDate, $endDate) !== false);
    }

    /**
     * @dataProvider InvalidDateProviders
     * @expectedException Exception
     */
    public function testItInputDateIsNotValid($startDate, $endDate)
    {
        $this->Calculation->validDate($startDate, $endDate);
    }

    /**
     * @dataProvider validDateProviders
     */
    public function testItgetDaysDiff($startDate, $endDate)
    {
        $this->Calculation->getDaysDiff($startDate, $endDate);
    }

    /**
     * @dataProvider validDateProviders
     */
    public function testItgetWorkingDaysDiff($startDate, $endDate)
    {
        $this->Calculation->getWorkingDaysDiff($startDate, $endDate);
    }

    /**
     * @dataProvider TimezoneProvider
     */
    public function testItconverToTz($time, $toTz, $fromTz)
    {
        $this->Calculation->converToTz($time, $toTz, $fromTz);
    }

    /**
     * @dataProvider validDateProviders
     */
    public function testItweeks_between($datefrom, $dateto)
    {
        $this->Calculation->weeks_between($datefrom, $dateto);
    }
}