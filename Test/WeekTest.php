<?php
use Calc\Classes\weekClass;
class WeekTest extends PHPUnit_Framework_TestCase
{
    public function setUp()
    {
        $this->Weekresult = new weekClass();
    }

    public function tearDown()
    {
        $this->Weekresult = NULL;
    }
    public function Weekprovider()
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

    public function InvalidWeekprovider()
    {
        return [
            ['a'],
            ['2.5 week'],
            ['2 week'],
            ['7 week']
        ];
    }

    /**
     * @dataProvider Weekprovider
     */
    public function testItweekstodifferent($weeks)
    {
        $this->Weekresult->weekstodifferent($weeks);
    }

    /**
     * @dataProvider Weekprovider
     */
    public function testItvalidWeekInput($weeks)
    {
        $this->Weekresult->weekstodifferent($weeks);
    }

    /**
     * @dataProvider InvalidWeekprovider
     * @expectedException Exception
     */
    public function testItInvalidWeekInput($weeks)
    {
        $this->Weekresult->weekstodifferent($weeks);
    }
}