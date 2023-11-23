<?php

namespace App\Tests;

use App\SmartSplFileInfo;
use PHPUnit\Framework\TestCase;

class SmartSplFileInfoTest extends TestCase
{
    public function testGetSize()
    {
        $file = new SmartSplFileInfo(__DIR__ . '/../Makefile');
        $this->assertEquals(46, $file->getSize());
        $this->assertEquals(368, $file->getSize('b'));
    }

    public function testException()
    {
        $this->expectException(\Exception::class);
        $file = new SmartSplFileInfo(__DIR__ . '/../Makefile');
        $file->getSize('something');
    }
}
