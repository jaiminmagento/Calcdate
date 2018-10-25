<?php
use Calc\Classes\daysResult;
class daysResultTest extends PHPUnit_Framework_TestCase
{
    public function setUp()
    {
        $this->Daysresult = new daysResult();
    }

    public function tearDown()
    {
        $this->Daysresult = NULL;
    }
    public function daysprovider()
    {
        return [
            [1],
            [2],
            [10],
            [40],
            [15],
            [25]
        ];
    }

    public function InvalidDaysprovider()
    {
        return [
            ['a'],
            ['2.5 week'],
            ['2 week'],
            ['7 week']
        ];
    }

    /**
     * @dataProvider daysprovider
     */
    public function testItdaystodifferent($days)
    {
        $this->Daysresult->daystodifferent($days);
    }

    /**
     * @dataProvider daysprovider
     */
    public function testItvalidDaysInput($days)
    {
        $this->Daysresult->daystodifferent($days);
    }

    /**
     * @dataProvider InvalidDaysprovider
     * @expectedException Exception
     */
    public function testItInvalidDaysInput($days)
    {
        $this->Daysresult->daystodifferent($days);
    }
}