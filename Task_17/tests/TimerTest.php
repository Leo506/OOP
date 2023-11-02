<?php
// установка
// composer require --dev phpunit/phpunit ^10
// composer update
// запуск
// php ./vendor/bin/phpunit --testdox tests
namespace Task_17\Tests;

use Task_17\Timer;
use PHPUnit\Framework\TestCase;

class TimerTest extends TestCase
{
    public function testTimer1()
    {
        $timer = new Timer(10);
        $this->assertEquals(10, $timer->getLeftSeconds());
        $timer->tick();
        $this->assertEquals(9, $timer->getLeftSeconds());
    }

    public function testTimer2()
    {
        $timer = new Timer(8, 20, 8);
        $this->assertEquals(30008, $timer->getLeftSeconds());
        $timer->tick();
        $this->assertEquals(30007, $timer->getLeftSeconds());
    }
}
