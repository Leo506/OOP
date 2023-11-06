<?php
// установка
// composer require --dev phpunit/phpunit ^10
// composer update
// запуск
// php ./vendor/bin/phpunit --testdox tests
namespace App\Tests;

use PHPUnit\Framework\TestCase;
use App\SquaresGenerator;
use App\Square;

class SquaresGeneratorTest extends TestCase
{
    public function testGenerate()
    {
        $squares = SquaresGenerator::generate(1, 1);
        $expected = [new Square(1)];
        $this->assertEquals($expected, $squares);

        $squares = SquaresGenerator::generate(3, 2);
        $expected = [new Square(3), new Square(3)];
        $this->assertEquals($expected, $squares);
        $this->assertNotSame($squares[0], $squares[1]);

        $squares = SquaresGenerator::generate(2);
        $this->assertEquals(count($squares), 5);
    }
}
