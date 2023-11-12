<?php

namespace App\Tests;

use PHPUnit\Framework\TestCase;

use function App\Dates\buildRange;

class DatesTest extends TestCase
{
    public function testGetRange()
    {
        $dates = [
          [ 'value' => 14, 'date' => '02.08.2018' ],
          [ 'value' => 43, 'date' => '03.08.2018' ],
          [ 'value' => 38, 'date' => '05.08.2018' ],
        ];
        $beginDate = '2018-08-01';
        $endDate = '2018-08-10';
        $expected = [
          [ 'value' => 0, 'date' => '01.08.2018' ],
          [ 'value' => 14, 'date' => '02.08.2018' ],
          [ 'value' => 43, 'date' => '03.08.2018' ],
          [ 'value' => 0, 'date' => '04.08.2018' ],
          [ 'value' => 38, 'date' => '05.08.2018' ],
          [ 'value' => 0, 'date' => '06.08.2018' ],
          [ 'value' => 0, 'date' => '07.08.2018' ],
          [ 'value' => 0, 'date' => '08.08.2018' ],
          [ 'value' => 0, 'date' => '09.08.2018' ],
          [ 'value' => 0, 'date' => '10.08.2018' ],
        ];

        $actual = buildRange($dates, $beginDate, $endDate);
        $this->assertEquals($expected, $actual);
    }

    public function testNotDates()
    {
        $dates = [];
        $beginDate = '2018-08-02';
        $endDate = '2018-08-04';
        $expected = [
          [ 'value' => 0, 'date' => '02.08.2018' ],
          [ 'value' => 0, 'date' => '03.08.2018' ],
          [ 'value' => 0, 'date' => '04.08.2018' ],
        ];

        $actual = buildRange($dates, $beginDate, $endDate);
        $this->assertEquals($expected, $actual);
    }

    public function testMonthRange()
    {
        $dates = [
          [ 'value' => 100, 'date' => '27.02.2019' ],
          [ 'value' => 0, 'date' => '02.03.2019' ],
        ];
        $beginDate = '2019-02-27';
        $endDate = '2019-03-02';
        $expected = [
          [ 'value' => 100, 'date' => '27.02.2019' ],
          [ 'value' => 0, 'date' => '28.02.2019' ],
          [ 'value' => 0, 'date' => '01.03.2019' ],
          [ 'value' => 0, 'date' => '02.03.2019' ],
        ];

        $actual = buildRange($dates, $beginDate, $endDate);
        $this->assertEquals($expected, $actual);
    }
}
