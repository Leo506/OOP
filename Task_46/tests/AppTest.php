<?php

namespace App\Tests;

use PHPUnit\Framework\TestCase;
use App\ConfigFactory;
use App\Config;

class AppTest extends TestCase
{
    public function testYml()
    {
        $config = ConfigFactory::build(__DIR__ . '/fixtures/test.yml');
        $this->assertInstanceOf(Config::class, $config);
        $this->assertEquals('value', $config->key);
    }

    public function testYaml()
    {
        $config = ConfigFactory::build(__DIR__ . '/fixtures/test2.yaml');
        $this->assertInstanceOf(Config::class, $config);
        $this->assertEquals('another value', $config->key);
    }

    public function testJson()
    {
        $config = ConfigFactory::build(__DIR__ . '/fixtures/test.json');
        $this->assertInstanceOf(Config::class, $config);
        $this->assertEquals('something else', $config->key);
    }
}
