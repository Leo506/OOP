<?php

namespace App\Tests;

use App\GoogleStorage;
use PHPUnit\Framework\TestCase;

class GoogleStorageTest extends TestCase
{
    public function testSetGet()
    {
        $storage = new GoogleStorage();
        $storage->set('one', 'two');
        $this->assertEquals('two', $storage->get('one'));
    }

    public function testCount()
    {
        $this->expectException(\Exception::class);
        $storage = new GoogleStorage();
        $storage->count();
    }
}
