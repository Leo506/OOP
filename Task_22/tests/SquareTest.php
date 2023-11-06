<?php
// установка
// composer require --dev phpunit/phpunit ^10
// composer update
// запуск
// php ./vendor/bin/phpunit --testdox tests
namespace App\Tests;

use PHPUnit\Framework\TestCase;
use App\Square;

class SquareTest extends TestCase
{
    public function testGetSide()
    {
        $side = 4;
        $square = new Square($side);
        $actual = $square->getSide();
        $expected = 4;
        $this->assertSame($expected, $actual);
    }
}

