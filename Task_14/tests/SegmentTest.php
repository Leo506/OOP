<?php
// установка
// composer require --dev phpunit/phpunit ^10
// composer update
// запуск
// php ./vendor/bin/phpunit --testdox tests
namespace Task_14\Tests;

use Task_14\Segment;
use PHPUnit\Framework\TestCase;

class SegmentTest extends TestCase
{
    public function testThatBeginPointIsPrivate()
    {
        $this->expectException(\Error::class);
        $segment = new Segment(3, 9);
        $segment->beginPoint;
    }

    public function testThatEndPointIsPrivate()
    {
        $this->expectException(\Error::class);
        $segment = new Segment(3, 9);
        $segment->endPoint;
    }

    public function test()
    {
        $segment = new Segment(3, 9);
        $this->assertEquals(3, $segment->getBeginPoint());
        $this->assertEquals(9, $segment->getEndPoint());
    }
}
